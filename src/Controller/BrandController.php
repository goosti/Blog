<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BrandController extends AbstractController
{
    #[Route('/brand', name: 'app_brand')]
    public function index(BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findAll();

        return $this->render('brand/index.html.twig', [
            'controller_name' => 'BrandController',
            'brands' => $brand,
        ]);
    }

    #[Route('/brand/{id}', name: 'app_brand_show')]
    public function show(int $id, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->find($id);

        return $this->render('brand/show.html.twig',[
            'id' => $id,
            'brands' => $brand,
        ]);

        if(empty($products[$id])){
            throw $this->createNotFoundException('Produit non trouvé');
    }
}
}