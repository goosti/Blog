<?php

namespace App\Controller;

use App\Entity\ProduitImage;
use App\Form\ProduitImageType;
use App\Repository\ProduitImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/produit/image')]
final class ProduitImageController extends AbstractController
{
    #[Route(name: 'app_produit_image_index', methods: ['GET'])]
    public function index(ProduitImageRepository $produitImageRepository): Response
    {
        return $this->render('produit_image/index.html.twig', [
            'produit_images' => $produitImageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_produit_image_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produitImage = new ProduitImage();
        $form = $this->createForm(ProduitImageType::class, $produitImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($produitImage);
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit_image/new.html.twig', [
            'produit_image' => $produitImage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produit_image_show', methods: ['GET'])]
    public function show(ProduitImage $produitImage): Response
    {
        return $this->render('produit_image/show.html.twig', [
            'produit_image' => $produitImage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_produit_image_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProduitImage $produitImage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProduitImageType::class, $produitImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produit_image/edit.html.twig', [
            'produit_image' => $produitImage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produit_image_delete', methods: ['POST'])]
    public function delete(Request $request, ProduitImage $produitImage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produitImage->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($produitImage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_produit_image_index', [], Response::HTTP_SEE_OTHER);
    }
}
