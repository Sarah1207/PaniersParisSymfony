<?php

namespace App\DataFixtures;

use App\Entity\Newsletter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsletterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 3; $i++) {
             $newsletter = new Newsletter();
            $newsletter->setEmail('newsletter'.$i.'@newsfake.com');

            $manager->persist($newsletter);
        }

        $manager->flush();
    }
}
