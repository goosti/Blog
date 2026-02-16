<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Repository\BrandRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BrandController extends AbstractController
{
    #[Route('/brand/{id}/products', name: 'app_brand_show')]
    public function showBrandProducts(Brand $brand, BrandRepository $brandRepository, ProductRepository $productRepository): Response
    {
    // Récupérer les produits de la marque

        $products = $productRepository->findAll();

        return $this->render('brand/show.html.twig', [
            'brand' => $brand,
            'brands' => $brandRepository->findAll(),
        ]);
    }


    #[Route('/brand', name: 'app_brand')]
    public function index(BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findAll();

        return $this->render('brand/index.html.twig', [
            'controller_name' => 'BrandController',
            'brands' => $brand,
        ]);
    }

    #[Route('/brand/new', name: 'app_brand_new', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $em, BrandRepository $brandRepository): Response
    {
        $brand = new Brand();
        $form = $this->createForm(BrandType::class, $brand);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($brand);
            $em->flush();

            return $this->redirectToRoute('app_brand');
        }
        

        return $this->render('brand/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/brand/edit/{id}', name: 'app_brand_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Brand $brand, EntityManagerInterface $em, BrandRepository $brandRepository): Response
    {
        if(!$brand){
            return $this->redirectToRoute('app_brand');
        }
        $form = $this->createForm(BrandType::class, $brand);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($brand);
            $em->flush();

            return $this->redirectToRoute('app_brand');
        }

        $brand = $brandRepository->findAll();

        return $this->render('brand/index.html.twig', [
            'form' => $form,
            'brands'=> $brand
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
