<?php

namespace App\DataFixtures;

use App\Entity\Customer\UserCustomer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class User extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

       $faker = Factory::create('fr_FR');
       for ($i = 0; $i<=20; $i++){
          $userD = new \App\Entity\User();
          $userD->setEmail($faker->email);
          $plainPassword = $faker->password;
          $encoded = $this->encoder->encodePassword($userD,$plainPassword);
          $userD->setPassword($encoded);
          $manager->persist($userD);
       }
        /*for ($i = 0; $i<=20; $i++){
            $userC = new UserCustomer();
            $userC->setEmail($faker->companyEmail);
            $userC->setPassword($faker->password);
            $manager->persist($userC);
        }*/

        $manager->flush();

    }
}
