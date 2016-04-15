<?php

use Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


/**
 * Fixtures for the Author Entity
 * Class Authors
 */
class Authors extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * {@inheritdoc}
     */
    public function getOrder(){
        return 10;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $a1 =new Author();
        $a1->setName('David');

        $a2 =new Author();
        $a2->setName('Eddie');

        $a3 =new Author();
        $a3->setName('Elsa');

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);

        $manager->flush();

    }
}
