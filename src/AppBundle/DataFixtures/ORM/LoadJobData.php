<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadJobData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadJobData implements FixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {

        $this->BuildDummyUser($manager); 
    }
 

    private function BuildDummyUser(ObjectManager $manager) {

        $encoder = $this->container->get('security.password_encoder');


        $users = [
            array('name' => 'John Doe', 'password' => '123', 'email' => 'jon.doe@email.com', 'role' => 'ROLE_ADMIN'),
            array('name' => 'Mary Doe', 'password' => '123', 'email' => 'mary.doe@email.com', 'role' => 'ROLE_USER'),
            array('name' => 'Mike Doe', 'password' => '123', 'email' => 'mike.doe@email.com', 'role' => 'ROLE_USER'),
        ];


        foreach ($users as $user) {
            $emUser = new \AppBundle\Entity\User();

            $emUser->setEmail($user['email']);
            $emUser->setName($user['name']);

            $password = $encoder->encodePassword($emUser, $user['password']);

            $emUser->setPassword($password);
            $emUser->setRole($user['role']);
            $manager->persist($emUser);
        }
        $manager->flush();
    }

}
