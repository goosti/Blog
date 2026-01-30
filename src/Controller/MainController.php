<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ArticleRepository $articleRepository): Response
    {

        $articles = $articleRepository->findAll();




        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'articles' => $articles,
        ]);
    }

    // requirements: ['slug' => '[a-z0-9\-]+']

    #[Route('/show/{id}', name: 'app_main_show', requirements: ['id' =>'\d+'], methods: ['GET'])]
    public function show(int $id, ArticleRepository $articleRepository): Response
    {


        // Récupérer l'article en fonction de son id
        // find($id) permet de récupérer un seul article via son id
        $article = $articleRepository->find($id);



        

        return $this->render('main/show.html.twig',[
            'id' => $id,
            'article' => $article,
        ]);

        if(empty($articles[$id])){
            throw $this->createNotFoundException('Article non trouvé');
    }
}
}