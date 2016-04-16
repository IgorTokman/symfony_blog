<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class PostController
 * @package Blog\CoreBundle\Controller
 */
class PostController extends Controller
{
    /**
     * Show the posts index
     *
     *
     * @Route("/")
     * @Template()
     */
    public function indexAction(){
        return array();
    }
}
