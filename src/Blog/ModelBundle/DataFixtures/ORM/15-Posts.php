<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Blog\ModelBundle\Entity\Author;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for Post Entity
 * Class Posts
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet');
        $p1->setBody(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Duis feugiat porttitor ligula, ac varius lorem consequat vitae. 
        Proin sed urna a augue varius porttitor id nec diam. 
        Quisque ligula neque, aliquet elementum lorem auctor, tincidunt commodo felis. Donec nisl turpis, 
        pharetra eget placerat fermentum, luctus in dui. Maecenas eget est sit amet justo blandit elementum 
        eget vel tellus. Sed condimentum enim lacus, non hendrerit justo hendrerit nec. In eu venenatis neque, 
        a fringilla orci. Fusce quis ligula ligula.
        Cras accumsan nec urna sed vestibulum. Suspendisse arcu nisl, posuere sit amet ultricies non, 
        facilisis sed arcu. Cras a augue ut purus rhoncus interdum vitae quis est. Aliquam erat volutpat. 
        Proin eu interdum justo, quis ultricies neque. Maecenas rutrum metus sit amet magna gravida, in euismod 
        libero facilisis. Curabitur viverra, purus eget fermentum venenatis, sem dui condimentum ligula, id sagittis 
        mi quam sit amet ipsum. Aliquam non mi magna. Maecenas et neque condimentum, sodales nulla eu, elementum nunc. 
        Suspendisse vehicula felis eget tellus interdum, eget vehicula neque hendrerit');

        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Lorem ipsum dolor sit amet');
        $p2->setBody(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Duis feugiat porttitor ligula, ac varius lorem consequat vitae. 
        Proin sed urna a augue varius porttitor id nec diam. 
        Quisque ligula neque, aliquet elementum lorem auctor, tincidunt commodo felis. Donec nisl turpis, 
        pharetra eget placerat fermentum, luctus in dui. Maecenas eget est sit amet justo blandit elementum 
        eget vel tellus. Sed condimentum enim lacus, non hendrerit justo hendrerit nec. In eu venenatis neque, 
        a fringilla orci. Fusce quis ligula ligula.
        Cras accumsan nec urna sed vestibulum. Suspendisse arcu nisl, posuere sit amet ultricies non, 
        facilisis sed arcu. Cras a augue ut purus rhoncus interdum vitae quis est. Aliquam erat volutpat. 
        Proin eu interdum justo, quis ultricies neque. Maecenas rutrum metus sit amet magna gravida, in euismod 
        libero facilisis. Curabitur viverra, purus eget fermentum venenatis, sem dui condimentum ligula, id sagittis 
        mi quam sit amet ipsum. Aliquam non mi magna. Maecenas et neque condimentum, sodales nulla eu, elementum nunc. 
        Suspendisse vehicula felis eget tellus interdum, eget vehicula neque hendrerit');

        $p2->setAuthor($this->getAuthor($manager, 'Eddie'));

        $p3 = new Post();
        $p3->setTitle('Lorem ipsum dolor sit amet');
        $p3->setBody(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Duis feugiat porttitor ligula, ac varius lorem consequat vitae. 
        Proin sed urna a augue varius porttitor id nec diam. 
        Quisque ligula neque, aliquet elementum lorem auctor, tincidunt commodo felis. Donec nisl turpis, 
        pharetra eget placerat fermentum, luctus in dui. Maecenas eget est sit amet justo blandit elementum 
        eget vel tellus. Sed condimentum enim lacus, non hendrerit justo hendrerit nec. In eu venenatis neque, 
        a fringilla orci. Fusce quis ligula ligula.
        Cras accumsan nec urna sed vestibulum. Suspendisse arcu nisl, posuere sit amet ultricies non, 
        facilisis sed arcu. Cras a augue ut purus rhoncus interdum vitae quis est. Aliquam erat volutpat. 
        Proin eu interdum justo, quis ultricies neque. Maecenas rutrum metus sit amet magna gravida, in euismod 
        libero facilisis. Curabitur viverra, purus eget fermentum venenatis, sem dui condimentum ligula, id sagittis 
        mi quam sit amet ipsum. Aliquam non mi magna. Maecenas et neque condimentum, sodales nulla eu, elementum nunc. 
        Suspendisse vehicula felis eget tellus interdum, eget vehicula neque hendrerit');

        $p3->setAuthor($this->getAuthor($manager, 'Eddie'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * Gets the author
     * @param ObjectManager $manager
     * @param $name
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $name){
        return $manager->getRepository('ModelBundle:Author')
            ->findOneBy(array(
                'name' => $name
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 15;
    }
}