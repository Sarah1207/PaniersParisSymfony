<?php

namespace App\Controller;

use App\Repository\PaniersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaniersController extends AbstractController
{
    /**
     * @Route("/paniers", name="paniers")
     * @param PaniersRepository $paniersRepository
     * @return Response
     */
    public function index(PaniersRepository $paniersRepository)
    {

        $paniers = $paniersRepository->findAll();


        return $this->render('paniers/paniers.html.twig', [
            'panierleger' => $paniers[0],
            'panierduo' => $paniers[1],
            'panierbig' => $paniers[2],
            'titre' => 'Paniers du mois',
        ]);
    }

}
