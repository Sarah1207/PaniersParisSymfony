<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Paniers;
use App\Entity\Producteurs;
use App\Entity\Produits;
use App\Entity\User;
use App\Repository\CommandeRepository;
use App\Repository\PaniersRepository;
use App\Repository\ProducteursRepository;
use App\Repository\ProduitsRepository;
use App\Repository\QuantityCommandRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * @param UserRepository $userRepository
     * @param PaniersRepository $paniersRepository
     * @param ProducteursRepository $producteursRepository
     * @param ProduitsRepository $produitsRepository
     * @param CommandeRepository $commandeRepository
     * @param QuantityCommandRepository $quantityCommandRepository
     * @return Response
     */

    public function dashbord (
        UserRepository $userRepository,
        PaniersRepository $paniersRepository,
        ProducteursRepository $producteursRepository,
        ProduitsRepository $produitsRepository,
        CommandeRepository $commandeRepository,
        QuantityCommandRepository $quantityCommandRepository
    )

    {
        //$pdo->query('SELECT * FROM user WHERE id = :id')->fetch()
        $users = $userRepository->findAll();
        $paniers = $paniersRepository->findAll();
        $produits = $produitsRepository->findAll();
        $producteurs = $producteursRepository->findAll();
        $commandes = $commandeRepository->findAll();
        $quantityCommand = $quantityCommandRepository->findAll();

        return $this->render('admin/admin.html.twig', [
            'users' => $users,
            'paniers' => $paniers,
            'produits' =>$produits,
            'producteurs' => $producteurs,
            'commandes' =>$commandes,
            'quantityCommand'=>$quantityCommand
        ]);

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->render('admin/admin.html.twig');
    }

    /* *************************************************************************/
    /**
     * @Route("/admin/producteur/delete", name="admin_producteur_delete")
     *
     * @param Producteurs $producteur
     * @return Response
     */
    public function deleteProducteur(Producteurs $producteur)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($producteur);
        $em->flush();
        return $this->redirectToRoute('admin');

    }

    /* *************************************************************************/
    /**
     * @Route("/admin/paniers/delete", name="admin_paniers_delete")
     *
     * @param Paniers $paniers
     * @return Response
     */
    public function deletePanier(Paniers $paniers)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($paniers);
        $em->flush();
        return $this->redirectToRoute('admin');

    }

    /* *************************************************************************/
    /**
     * @Route("/admin/user/delete", name="admin_user_delete")
     *
     * @param User $user
     * @return Response
     */
    public function deleteUser(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('admin');

    }



    /* *************************************************************************/
    /**
     * @Route("/admin/produits/delete", name="admin_produits_delete")
     * @param Produits $produits
     * @return Response
     */
    public function deleteProduits(Produits $produits)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($produits);
        $em->flush();
        return $this->redirectToRoute('admin');
    }

    /* *************************************************************************/
    /**
     * @Route("/admin/commandes/delete", name="admin_commandes_delete")
     * @param Commande $commandes
     * @return Response
     */
    public function deleteCommande(Commande $commandes)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($commandes);
        $em->flush();
        return $this->redirectToRoute('admin');
    }
}
