<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function index(UserRepository $userRepository)
    {
        $user = $userRepository->findAll();
        return $this->render('index/index.html.twig', [
            'user' => $user,

        ]);
        dd($user);
    }

    /**
     * @Route("/", name="root")
     */
    public function root()
    {
        return $this->redirectToRoute('index');
    }
}
