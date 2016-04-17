<?php

namespace Tests\Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    /**
     * Tests posts index
     */
    public function testIndex(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful(),
            "The response was not successfulaaaaaaaaaaaaaaaaaa");

        $this->assertCount(3, $crawler->filter('h2'), 'There should be 3 displayed posts');
    }

    /**
     * Test show post
     */
    public function testShow(){

        $client = static::createClient();

        /**@var post $post**/
        $post = $client->getContainer()->get('doctrine')
                        ->getManager()->getRepository('ModelBundle:Post')
                        ->findFirst();

        $crawler = $client->request('GET', '/' . $post->getSlug());

        $this->assertTrue($client->getResponse()->isSuccessful(),
            "The response was not successfulllllllllll");

        $this->assertEquals($post->getTitle(), $crawler->filter('h1')->text(), 'Invalid post title');

        $this->assertGreaterThanOrEqual(1, $crawler->filter('article.comment')->count(),
                    'There should be at least 1 post');
    }

    /**
     * Test create a comment
     */
    public function testCreateComment(){
        $client = static::createClient();

        /**@var post $post**/
        $post = $client->getContainer()->get('doctrine')
            ->getManager()->getRepository('ModelBundle:Post')
            ->findFirst();

        $crawler = $client->request('GET', '/' . $post->getSlug());

        $buttonCrawlerNode = $crawler->selectButton('Send');

        $form = $buttonCrawlerNode->form( array(
            'blog_modelbundle_comment[authorName]' => 'A humble commenter',
            'blog_modelbundle_comment[body]' => 'Hi! I am commenting about project'
        ));

        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect('/'.$post->getSlug()),
            'There was no redirection after submitting');

        $crawler = $client->followRedirect();

        $this->assertCount(1,
            $crawler->filter('html:contains("Your comment was submitted successfully")'),
            'There was not any confirmation message');
    }
}
