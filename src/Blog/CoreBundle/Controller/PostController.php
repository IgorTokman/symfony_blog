<?php

namespace Blog\CoreBundle\Controller;

use Blog\ModelBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $posts = $this->getDoctrine()->getRepository("ModelBundle:Post")->findAll();
        $latestPosts = $this->getDoctrine()->getRepository('ModelBundle:Post')->findLatest(5);

        return array(
            "posts" => $posts,
            "latestPosts" => $latestPosts
        );
    }

    /**
     * Show a post
     *
     * @param $slug
     * @throws NotFoundHttpException
     * @return array
     * @Route("/{slug}")
     * @Template()
     */
    public function showAction($slug){
        $post = $this->getDoctrine()->getRepository("ModelBundle:Post")->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if($post === null)
            throw $this->createNotFoundException("Post was not found");

        $form = $this->createForm(CommentType::class);

        return array(
            'post' => $post,
            'form' => $form->createView()
        );
    }

    /**
     * Create comment
     *
     * @param Request $request
     * @param $slug
     *
     * @Route("/{slug}/create-comment")
     * @Method("Post")
     * @Template("CoreBundle:Post:show.html.twig")
     *
     * @return array
     */
    public function createCommentAction(Request $request, $slug){
        return array();
    }
}
