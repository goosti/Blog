<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'app_auteur')]
    public function index(AuteurRepository $auteurRepository): Response
    {
        $auteurs = $auteurRepository->findAll();

        return $this->render('auteur/index.html.twig', [
            'controller_name' => 'AuteurController',
            'auteurs' => $auteurs,
        ]);
    }


    #[Route('/auteur/{id}', name: 'app_auteur_show', requirements: ['id' =>'\d+'], methods: ['GET'])]
    public function show(int $id, AuteurRepository $auteurRepository): Response
    {


        $auteur = $auteurRepository->find($id);

        return $this->render('auteur/index.html.twig',[
            'id' => $id,
            'auteur' => $auteur,
        ]);

        if(empty($auteurs[$id])){
            throw $this->createNotFoundException('Auteur non trouvé');
    }
    }
}
