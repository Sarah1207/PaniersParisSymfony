<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setPseudo('Linda_ou');
        $admin->setEmail('linda.phan95@gmail.com');
        $admin->setPrenom('Linda');
        $admin->setNom('Phan');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setAdresse('6 allée des troenes');
        $admin->setVille('Taverny');
        $admin->setCp('95150');
        $admin->setTel('0769096381');
        $admin->setDob('09/02/1991');
        $admin->setPassword($this->encoder->encodePassword($admin,'root'));

        $manager->persist($admin);
        $manager->flush();
    }
}
