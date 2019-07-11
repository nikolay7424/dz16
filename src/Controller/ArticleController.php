<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;



class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    public function createArticle(): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();
        $article->setTitle('title');
        $article->setText('text');
        $article->setIsPublished(true);

        $entityManager->persist($article);

        $entityManager->flush();

        return new Response('Saved new article with id '.$article->getId());

    }
}
