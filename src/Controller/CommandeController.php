<?php

namespace App\Controller;

use App\Repository\PaniersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index(SessionInterface $session, PaniersRepository $paniersRepository)
    {
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


        return $this->render('commande/commande.html.twig', [
            'items' => $commandeData,
            'total' => $total
        ]);

    }


    /**
     * @Route("/commande/add/{id<\d+>}", name="commande_add")
     */

    public function add($id, SessionInterface $session)
    {

        $commande = $session->get('commande', []);

        if (!empty($commande[$id])) {
            $commande[$id]++;
        } else {
            $commande[$id] = 1;
        }

        $session->set('commande', $commande);

        return $this->redirectToRoute("commande");

    }

    /**
     * @Route("/commande/delete/{id<\d+>}", name="commande_delete")
     */

    public function delete($id, SessionInterface $session)
    {
        $commande = $session->get('commande',[]);
        if(!empty($commande[$id])) {
            unset($commande[$id]);
        }

        $session->set('commande',$commande);

        return $this->redirectToRoute('commande');

    }
}
