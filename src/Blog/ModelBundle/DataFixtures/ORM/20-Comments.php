<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class Comments
 * @package Blog\ModelBundle\DataFixtures\ORM
 */
class Comments extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();

        $comments = array(
            0 => 'Maecenas finibus, velit in posuere mattis, mi lorem pulvinar mi, id accumsan libero tortor ut mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed varius faucibus urna non congue. Suspendisse ac massa ut mauris tempor lobortis et nec tellus. Nam rutrum quam neque, ut posuere mi finibus in. Pellentesque consectetur, sem vitae facilisis accumsan, felis diam imperdiet nisl, quis volutpat nibh felis a dolor. Sed lectus velit, eleifend a mi at, tincidunt facilisis libero. Nulla semper erat vulputate arcu feugiat egestas. Vivamus sagittis risus et libero blandit, a sollicitudin odio commodo. Aenean lacinia felis sit amet nulla porta imperdiet. Etiam semper, est vitae suscipit dapibus, lorem massa fringilla justo, vitae pretium est risus vitae purus. Pellentesque maximus diam eu est pretium, sit amet volutpat velit convallis. Nam semper id sem a viverra. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nec efficitur lectus, eleifend aliquet metus. ',
            1 => 'Maecenas finibus, velit in posuere mattis, mi lorem pulvinar mi, id accumsan libero tortor ut mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed varius faucibus urna non congue. Suspendisse ac massa ut mauris tempor lobortis et nec tellus. Nam rutrum quam neque, ut posuere mi finibus in. Pellentesque consectetur, sem vitae facilisis accumsan, felis diam imperdiet nisl, quis volutpat nibh felis a dolor. Sed lectus velit, eleifend a mi at, tincidunt facilisis libero. Nulla semper erat vulputate arcu feugiat egestas. Vivamus sagittis risus et libero blandit, a sollicitudin odio commodo. Aenean lacinia felis sit amet nulla porta imperdiet. Etiam semper, est vitae suscipit dapibus, lorem massa fringilla justo, vitae pretium est risus vitae purus. Pellentesque maximus diam eu est pretium, sit amet volutpat velit convallis. Nam semper id sem a viverra. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nec efficitur lectus, eleifend aliquet metus. ',
            2 => 'Maecenas finibus, velit in posuere mattis, mi lorem pulvinar mi, id accumsan libero tortor ut mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed varius faucibus urna non congue. Suspendisse ac massa ut mauris tempor lobortis et nec tellus. Nam rutrum quam neque, ut posuere mi finibus in. Pellentesque consectetur, sem vitae facilisis accumsan, felis diam imperdiet nisl, quis volutpat nibh felis a dolor. Sed lectus velit, eleifend a mi at, tincidunt facilisis libero. Nulla semper erat vulputate arcu feugiat egestas. Vivamus sagittis risus et libero blandit, a sollicitudin odio commodo. Aenean lacinia felis sit amet nulla porta imperdiet. Etiam semper, est vitae suscipit dapibus, lorem massa fringilla justo, vitae pretium est risus vitae purus. Pellentesque maximus diam eu est pretium, sit amet volutpat velit convallis. Nam semper id sem a viverra. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur nec efficitur lectus, eleifend aliquet metus. ',
        );

        $i = 0;

        foreach ($posts as $post){
            $comment = new Comment();
            $comment->setAuthorName('Someone');
            $comment->setBody($comments[$i++]);
            $comment->setPost($post);

            $manager->persist($comment);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     *
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}