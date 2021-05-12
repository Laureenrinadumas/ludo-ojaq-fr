<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;

    }

    public function load(ObjectManager $manager)
    {
        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setDateOfBirth(\DateTime::createFromFormat('d/m/Y', '30/12/1986'));
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'adminpassword'
        ));

        $manager->persist($admin);

        // Création d’un utilisateur de type “auteur”
        $subscriberPro = new User();
        $subscriberPro->setUsername('lau');
        $subscriberPro->setDateOfBirth(\DateTime::createFromFormat('d/m/Y', '16/05/1979'));
        $subscriberPro->setEmail('laureen@monsite.com');
        $subscriberPro->setRoles(['ROLE_SUBSCRIBER']);
        $subscriberPro->setPassword($this->passwordEncoder->encodePassword(
            $subscriberPro,
            'laupassword'
        ));

        $manager->persist($subscriberPro);

        //sauvegarder des deux utilisateurs
        $manager->flush();
    }
}
