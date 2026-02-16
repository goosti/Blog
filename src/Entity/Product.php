<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\HasLifecycleCallbacks]

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Le titre doit comporter au moins {{ limit }} caractères.',
        maxMessage: 'Le titre ne peut pas dépassé {{ limit }} caractères.'
    )]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 10,
        minMessage: 'Le titre doit comporter au moins {{ limit }} caractères.'
    )]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Positive(
        message: 'Le prix doit être un nombre positif.'
    )]
    private ?float $prix = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Positive(
        message: 'Le stock doit être un nombre positif.'
    )]
    private ?int $stock = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    #[Assert\NotNull(
        message: 'Vous devez accepter les termes.'
    )]
    private ?bool $acceptConditions = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updateAt = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $marque = null;

    /**
     * @var Collection<int, ProduitImage>
     */
    #[ORM\OneToMany(targetEntity: ProduitImage::class, mappedBy: 'produit')]
    private Collection $produitImages;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, mappedBy: 'produits')]
    private Collection $tags;

    public function __construct()
    {
        $this->produitImages = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void {
        $this->setImageName('https://picsum.photos/seed/7/680/480');
        $this->setCreateAt(new DateTimeImmutable());

        if($this->titre && !$this->slug){
            $this->generateSlug();
        }
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void {
        $this->updateAt = new DateTime();
    }

    private function generateSlug(): void {
        $slugger = new AsciiSlugger();
        $this->slug = $slugger->slug($this->titre)->lower();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function isAcceptConditions(): ?bool
    {
        return $this->acceptConditions;
    }

    public function setAcceptConditions(bool $acceptConditions): static
    {
        $this->acceptConditions = $acceptConditions;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTime $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getMarque(): ?Brand
    {
        return $this->marque;
    }

    public function setMarque(?Brand $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, ProduitImage>
     */
    public function getProduitImages(): Collection
    {
        return $this->produitImages;
    }

    public function addProduitImage(ProduitImage $produitImage): static
    {
        if (!$this->produitImages->contains($produitImage)) {
            $this->produitImages->add($produitImage);
            $produitImage->setProduit($this);
        }

        return $this;
    }

    public function removeProduitImage(ProduitImage $produitImage): static
    {
        if ($this->produitImages->removeElement($produitImage)) {
            // set the owning side to null (unless already changed)
            if ($produitImage->getProduit() === $this) {
                $produitImage->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            $tag->addProduit($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeProduit($this);
        }

        return $this;
    }
}
