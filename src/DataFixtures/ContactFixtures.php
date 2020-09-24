<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 3; $i++) {
             $contact = new Contact();
            $contact->setNom('contact'.$i);
            $contact->setEmail('contact'.$i.'@contactfake.com');
            $contact->setCommentaire('contact'.$i);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
