<?php

namespace Blog\CoreBundle\Controller;

use Blog\ModelBundle\Entity\Comment;
use Blog\ModelBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
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
        $post = $this->getDoctrine()->getRepository("ModelBundle:Post")->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if($post === null)
            throw $this->createNotFoundException('Post was not found');

        $comment = new Comment();
        $comment->setPost($post);

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();

            $this->get('session')->getFlashBag()->add('success', "Your comment was submitted successfully");

            return $this->redirect($this->generateUrl('blog_core_post_show', array(
                'slug' => $post->getSlug()
            )));
        }

        return array(
            'post' => $post,
            'form' => $form->createView()
        );
    }
}
