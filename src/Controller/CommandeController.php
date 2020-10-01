<?php

namespace App\Controller;

use App\Service\ServiceCommande;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     * @param ServiceCommande $serviceCommande
     * @return Response
     */
    public function index(ServiceCommande $serviceCommande)
    {
        $commandeData = $serviceCommande->getCommandeAll();
        $total = $serviceCommande->getPrixTotal();
        $quantite = $serviceCommande->getQuantite();

        return $this->render('commande/commande.html.twig', [
            'items' => $commandeData,
            'total' => $total,
            'quantite' => $quantite
        ]);

    }

    /* ************************************************************************************************************* */

    /**
     * @Route("/commande/add/{id<\d+>}", name="commande_add")
     * @param $id
     * @param Request $request
     * @param ServiceCommande $serviceCommande
     * @return RedirectResponse
     */

    public function add($id, Request $request, ServiceCommande $serviceCommande)
    {
        $serviceCommande->add($id, $request->request->get('quantite'));

        return $this->redirectToRoute("commande");
    }

    /* ************************************************************************************************************* */

    /**
     * @Route("/commande/delete/{id<\d+>}", name="commande_delete")
     * @param $id
     * @param ServiceCommande $serviceCommande
     * @return RedirectResponse
     */

    public function delete($id, ServiceCommande $serviceCommande)
    {
        $serviceCommande->delete($id);

        return $this->redirectToRoute('commande');
    }
}
