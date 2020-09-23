<?php

namespace App\DataFixtures;

use App\Entity\Produits;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProduitsFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $produit = new Produits();
        $produit->setNomProduit('Pommes de terre Allouette Cal 38/60');
        $produit->setProducteur($this->getReference("producteur1"));
        $manager->persist($produit);


        $produit2= new Produits();
        $produit2->setNomProduit('Carotte Cat. II');
        $produit2->setProducteur($this->getReference("producteur1"));
        $manager->persist($produit2);

        $produit3 = new Produits();
        $produit3->setNomProduit('Courgette Cat. II');
        $produit3->setProducteur($this->getReference("producteur1"));
        $manager->persist($produit3);

        $produit4 = new Produits;
        $produit4->setNomProduit('Brocoli Cat. NC');
        $produit4->setProducteur($this->getReference("producteur2"));
        $manager->persist($produit4);

        $produit5= new Produits;
        $produit5->setNomProduit('Tomate ancienne Cat. II');
        $produit5->setProducteur($this->getReference("producteur2"));
        $manager->persist($produit5);

        $produit6= new Produits();
        $produit6->setNomProduit('Banane Cat. II');
        $produit6->setProducteur($this->getReference("producteur2"));
        $manager->persist($produit6);


        $manager->flush();
    }
}
