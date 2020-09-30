<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\QuantityCommand;
use App\Service\ServiceCommande;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class PaiementController extends AbstractController
{
    /**
     * @Route("/paiement", name="paiement")
     * @param ServiceCommande $serviceCommande
     * @return Response
     */

    public function index(ServiceCommande $serviceCommande)
    {
        $commandeData = $serviceCommande->getCommandeAll();
        $total = $serviceCommande->getPrixTotal();

        return $this->render('paiement/paiement.html.twig', [
            'items' => $commandeData,
            'total' => $total
        ]);
    }

    /* *********************************************************************************************************************** */

    /**
     * @Route("/paiement/success", name="paiement_success")
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @param SessionInterface $session
     * @param ServiceCommande $serviceCommande
     * @return Response
     * @throws ApiErrorException
     */

    public function success(EntityManagerInterface $manager, Request $request, SessionInterface $session, ServiceCommande $serviceCommande)
    {
        Stripe::setApiKey('sk_test_51HUppUBb7QcaL3i8AlEcYg4LKmYtElWda1jh8omKNrqf0WQP7wNzAas9eWx1ZbqC8iVIQuo1xbu0mB0LrLP7MZE400Il2gFq3Y');

        // Token is created using Stripe Checkout or Elements
        // Get the payment token ID submitted by the form:
        $token = $request->get('stripeToken');

        $commandeData = $serviceCommande->getCommandeAll();
        $total = $serviceCommande->getPrixTotal();

        /* Charge = générée par Stripe */
        $charge = Charge::create([
            'amount' => $total * 100,
            'currency' => 'eur',
            'description' => [],
            'source' => $token,
        ]);


        /* ******************************** ENREGISTREMENT DANS LA BDD ********************* */
        $commandeBdd = new Commande();
        $commandeBdd->setUser($this->getUser());
        $commandeBdd->setPrixTotal($charge->amount / 100);

        $commandeBdd->setDate(new DateTime('now'));
        $commandeBdd->setStatut("réglé");
        $commandeBdd->setRetrait("non");

        foreach ($commandeData as $command) {
            $quantity = new QuantityCommand();
            $article = $command['article'];
            $article->setStock($article->getStock() - $command['quantite']);
            $quantity->setQuantite($command['quantite']);
            $quantity->setCommand($commandeBdd);
            $quantity->setPanier($article);
            $manager->persist($quantity);
            $manager->persist($article);
        }

        $manager->persist($commandeBdd);
        $manager->flush();

        /**********************************************************************************/

        /* ************** SUPPRESSION DE LA SESSION UNE FOIS LA COMMANDE ENREGISTREE EN BDD */
        $session->invalidate();
        /**********************************************************************************/


        return $this->render('paiement/paiement_success.html.twig', [
            'user' => $commandeBdd->getUser(),
            'commande' => $commandeBdd->getId(),
        ]);

    }
}