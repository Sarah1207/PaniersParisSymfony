<?php

namespace App\DataFixtures;

use App\Entity\Paniers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PaniersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        //////////PANIER LEGER
        ///
        $panier1 = new Paniers();
        $panier1->setNomPanier('Panier Leger');
        $panier1->setDescriptionPanier('3 à 3.4 kg de fruits et légumes. Idéal pour les parisiens préssés. Convient pour une personne pour une semaine.');
        $panier1->setPoidsPanier('3.4');
        $panier1->setPrixPanier('16');
        $panier1->setStock('250');
        $panier1->setComposition('Pommes de terre Allouette | Carotte Cat. II | Courgette Cat. II | Brocoli | Tomate ancienne Cat. II');

       // $this->addReference('panierleger', $panier1);
        $manager->persist($panier1);


        //////////PANIER DUO

        $panier2 = new Paniers();
        $panier2->setNomPanier('Panier Duo');
        $panier2->setDescriptionPanier('7 à 7.4 kg de fruits et légumes. Idéal pour cuisiner en     amoureux. Convient pour deux personnes pour une semaine.');
        $panier2->setPoidsPanier('7');
        $panier2->setPrixPanier('26');
        $panier2->setStock('200');
        $panier2->setComposition('Pommes de terre Allouette | Carotte Cat. II | Courgette Cat. II | Brocoli | Tomate ancienne Cat. II | Banane Cat. II');

        //$this->addReference('panierduo', $panier2);
        $manager->persist($panier2);


        //////////PANIER big
        ///
        $panier3 = new Paniers();
        $panier3->setNomPanier('Panier Big');
        $panier3->setDescriptionPanier('8.5 à 9 kg de fruits et légumes. Votre famille vous remerciera.Convient pour quatre personnes pour une semaine.');
        $panier3->setPoidsPanier('8.5');
        $panier3->setPrixPanier('31');
        $panier3->setStock('200');
        $panier3->setComposition('Pommes de terre Allouette | Carotte Cat. II | Courgette Cat. II | Brocoli | Tomate ancienne Cat. II | Banane Cat. II');

       // $this->addReference('panierbig', $panier3);
        $manager->persist($panier3);


        $manager->flush();
    }
}
