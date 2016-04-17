<?php

namespace Blog\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class AuthorControllerTest
 * @package Blog\CoreBundle\Tests\Controller
 */
class AuthorControllerTest extends WebTestCase
{
    /**
     * Test show author
     */
    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show');
    }

}
