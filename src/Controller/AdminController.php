<?php

namespace App\Controller;

use App\Entity\Paniers;
use App\Entity\Producteurs;
use App\Entity\User;
use App\Repository\PaniersRepository;
use App\Repository\ProducteursRepository;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function dashbord(
        UserRepository $userRepository,
        PaniersRepository $paniersRepository,
        ProducteursRepository $producteursRepository
    )
    {
        //$pdo->query('SELECT * FROM user WHERE id = :id')->fetch()
        $users = $userRepository->findAll();
        $paniers = $paniersRepository->findAll();
        $producteurs = $producteursRepository->findAll();
        return $this->render('admin/admin.html.twig', [
            'users' => $users,
            'paniers' => $paniers,
            'producteurs' => $producteurs,
        ]);

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->render('admin/admin.html.twig');


    }

    /**
     * @Route("/admin/producteur/delete", name="admin_producteur_delete")
     *
     * @return Response
     */
    public function deleteProducteur(Producteurs $producteur)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($producteur);
        $em->flush();
        return $this->redirectToRoute('admin');

    }

    /**
     * @Route("/admin/paniers/delete", name="admin_paniers_delete")
     *
     * @return Response
     */
    public function deletePanier(Paniers $paniers)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($paniers);
        $em->flush();
        return $this->redirectToRoute('admin');

    }

    /**
     * @Route("/admin/user/delete", name="admin_user_delete")
     *
     * @return Response
     */
    public function deleteUser(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('admin');

    }
}