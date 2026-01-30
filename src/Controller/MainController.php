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
    public function show(int $id): Response
    {

        // Si l'id n'est pas entre 1 et 20, on redirige vers la page d'accueil
        if($id <1 || $id > 20){
            // throw $this->createNotFoundException('Article non trouvé');
            throw $this->redirect('app_main');
        }


        

        return $this->render('main/show.html.twig',[
            'articles' => $articles,
            'id' => $id
        ]);

        if(empty($articles[$id])){
            throw $this->createNotFoundException('Article non trouvé');
    }
}
}