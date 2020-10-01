<?php

namespace App\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="user")
     */
    public function index($id, UserRepository $userRepository)
    {
        //$pdo->query('SELECT * FROM user WHERE id = :id')->fetch()
        $user = $userRepository->find($id);
        if($user === null){
            // Pas d'utilisateur : erreur 404
            throw $this->createNotFoundException('Aucun utilisateur trouvé');
        }

        return $this->render('user/profile.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/delete/{id}", name="user_delete")
     *
     * @return Response
     */
    public function delete(User $user){
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->render('index/index.html.twig');
    }
}

