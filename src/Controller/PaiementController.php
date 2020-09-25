<?php

namespace App\Controller;

use App\Repository\PaniersRepository;
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
     * @return Response
     */

    public function index()
    {
        return $this->render('paiement/paiement.html.twig');

    }



    /**
     * @Route("/paiement/success", name="paiement_success")
     * @param Request $request
     * @param SessionInterface $session
     * @param PaniersRepository $paniersRepository
     * @return Response
     * @throws ApiErrorException
     */

        public function success (Request $request, SessionInterface $session, PaniersRepository $paniersRepository)
        {
            Stripe::setApiKey('sk_test_51HUppUBb7QcaL3i8AlEcYg4LKmYtElWda1jh8omKNrqf0WQP7wNzAas9eWx1ZbqC8iVIQuo1xbu0mB0LrLP7MZE400Il2gFq3Y');

            // Token is created using Stripe Checkout or Elements
            // Get the payment token ID submitted by the form:
            $token = $request->get('stripeToken');

            $commande = $session->get('commande', []);

            $commandeData = [];

            foreach ($commande as $id => $quantite) {
                $commandeData[] = [
                    'article' => $paniersRepository->find($id),
                    'quantite' => $quantite
                ];
            }

            $total = 0;
            foreach ($commandeData as $item) {
                $totalItem = $item['article']->getPrixPanier() * $item['quantite'];
                $total += $totalItem;
            }


            $charge = Charge::create([
                'amount' => $total= $total*100,
                'currency' => 'eur',
                'description' => 'Example charge',
                'source' => $token,
            ]);


            return $this->render('paiement/paiement_success.html.twig', [
                'charge' => $charge,
            ]);


        }


}