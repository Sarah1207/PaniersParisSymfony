<?php

namespace App\DataFixtures;

use App\Entity\Producteurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProducteursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        ////////////////PRODUCTEUR 1
        ///
        ///
        $producteur1 = new Producteurs();
        $producteur1->setPrenom('Claude');
        $producteur1->setNom('Thimo');
        $producteur1->setType('fruits et légumes');
        $producteur1->setDepartement('95');
        $producteur1->setVille('Auvers-sur-Oise');
        $producteur1->setDescriptionProducteur('Situé au nord de Paris à Auvers-sur-Oise, nous sommes une entreprise familiale : depuis sa création par mes parents en 1994, j\'ai toujours été présent, et lorsque j\'ai eu terminé mes études de commerce, cela était une évidence pour moi de les rejoindre! Depuis 12 ans, je suis devenu associé de la production. Nous cultivons avec fierté toutes sortes de fruits et légumes selon les saisons. Un objectif m’anime au quotidien : créer un lien plus intime avec le consommateur et faire goûter la nature...« Fier d’être producteur !»');
        $this->addReference("producteur1", $producteur1);
        $manager->persist($producteur1);


        ////////////////PRODUCTEUR 2
        ///
        ///
        $producteur2 = new Producteurs();
        $producteur2->setPrenom('Bernard');
        $producteur2->setNom('Grath');
        $producteur2->setType('fruits et légumes');
        $producteur2->setDepartement('95');
        $producteur2->setVille('Magny-en-Vexin');
        $producteur2->setDescriptionProducteur('Producteur de fruits et légumes depuis plus de 30 ans à Magny-en-Vexin. D\'abord arboriculteurs de père en fils, nous avons développé notre activité grâce au maraîchage. Résolument tourné vers l’avenir,c’est avec plaisir que je consacre du temps à cultiver mes produits dans le respect de la nature, sur un sol vivant, à la main et sans aucun produit. C’est l’intervention humaine et le savoir-faire allié à l’amour de la terre qui feront la différence. « Il faut être passionné pour faire ce métier et cela représente beaucoup de choses pour moi.»');
        $this->addReference("producteur2", $producteur2);

        $manager->persist($producteur2);


        $manager->flush();
    }
}
