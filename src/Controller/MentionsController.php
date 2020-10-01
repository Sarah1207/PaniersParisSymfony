<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MentionsController extends AbstractController
{
    /**
     * @Route("/mentions", name="app_mentions")
     */
    public function index()
    {
        return $this->render('mentions/mentions.html.twig', [
            'mentions' => 'MentionsController',
        ]);
    }
}
