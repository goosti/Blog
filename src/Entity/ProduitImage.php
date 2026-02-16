<?php

namespace App\Entity;

use App\Repository\ProduitImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitImageRepository::class)]
class ProduitImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\ManyToOne(inversedBy: 'produitImages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getProduit(): ?Product
    {
        return $this->produit;
    }

    public function setProduit(?Product $produit): static
    {
        $this->produit = $produit;

        return $this;
    }
}
