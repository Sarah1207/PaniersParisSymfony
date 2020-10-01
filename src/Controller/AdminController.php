<?php

namespace App\Controller;

use App\Entity\Paniers;
use App\Entity\Producteurs;
use App\Entity\User;
use App\Repository\PaniersRepository;
use App\Repository\ProducteursRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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
        ProducteursRepository $producteursRepository,
        EntityManagerInterface $manager
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

        $manager->remove($user);
        $manager->flush();
        return $this->render('admin/admin.html.twig');


    }

    /**
     * @Route("/admin/producteur/delete/{id}", name="admin_producteur_delete")
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
     * @Route("/admin/paniers/delete/{id}", name="admin_paniers_delete")
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
     * @Route("/admin/user/delete/{id}", name="admin_user_delete")
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

    /**
     * @Route ("/admin/producteurs/add", name="producteurs_add")
     * @Route ("/admin/producteurs/edit/{id}", name="producteurs_edit")
     */
    public function product_add(Request $request, EntityManagerInterface $manager,Producteurs $producteurs=null)
    {
        if($producteurs === null){
            $producteurs = new Producteurs();
        }

        $form_product = $this->createFormBuilder($producteurs)
            ->add('prenom')
            ->add('nom')
            ->add('type')
            ->add('ville')
            ->add('departement')
            ->add('description_producteur',TextType::class)
            ->getForm();
        $form_product->handleRequest($request);


        if ($form_product->isSubmitted() && $form_product->isValid()) {
            $manager->persist($producteurs);
            $manager->flush();
            return $this->redirectToRoute('admin');
        }

            return $this->render('admin/form_product.html.twig', [
                'form_product' => $form_product->createView(),
                'editMode'=> $producteurs->getId() !== null,
            ]);



    }

    /**
     * @Route ("/admin/paniers/add", name="paniers_add")
     * @Route ("/admin/paniers/edit/{id}", name="paniers_edit")
     */
    public function paniers_add(Request $request, EntityManagerInterface $manager,Paniers $paniers=null)
    {
        if($paniers === null){
            $paniers= new Paniers();
        }

        $form_paniers = $this->createFormBuilder($paniers)
            ->add('nom_panier')
            ->add('composition')
            ->add('prix_panier',TextType::class,['label'=>'Prix en €'])
            ->add('poids_panier',TextType::class,['label'=>'Poids en kg'])
            ->add('stock')
            ->add('description_panier',TextType::class)

            ->getForm();
        $form_paniers->handleRequest($request);


        if ($form_paniers->isSubmitted() && $form_paniers->isValid()) {
            $manager->persist($paniers);
            $manager->flush();
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/form_panier.html.twig', [
            'form_paniers' => $form_paniers->createView(),
            'editMode'=> $paniers->getId() !== null,
        ]);



    }
}