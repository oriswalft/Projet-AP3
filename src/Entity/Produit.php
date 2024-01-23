<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[ApiResource()]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rayon $categorie = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Etagere::class, mappedBy: 'produit')]
    private Collection $etageres;

    #[ORM\OneToMany(mappedBy: 'produits', targetEntity: ProdCom::class)]
    private Collection $prodComs;




    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->Modulee = new ArrayCollection();
        $this->etageres = new ArrayCollection();
        $this->prodComs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCategorie(): ?Rayon
    {
        return $this->categorie;
    }

    public function setCategorie(?Rayon $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Etagere>
     */
    public function getEtageres(): Collection
    {
        return $this->etageres;
    }

    public function addEtagere(Etagere $etagere): static
    {
        if (!$this->etageres->contains($etagere)) {
            $this->etageres->add($etagere);
            $etagere->addProduit($this);
        }

        return $this;
    }

    public function removeEtagere(Etagere $etagere): static
    {
        if ($this->etageres->removeElement($etagere)) {
            $etagere->removeProduit($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ProdCom>
     */
    public function getProdComs(): Collection
    {
        return $this->prodComs;
    }

    public function addProdCom(ProdCom $prodCom): static
    {
        if (!$this->prodComs->contains($prodCom)) {
            $this->prodComs->add($prodCom);
            $prodCom->setProduits($this);
        }

        return $this;
    }

    public function removeProdCom(ProdCom $prodCom): static
    {
        if ($this->prodComs->removeElement($prodCom)) {
            // set the owning side to null (unless already changed)
            if ($prodCom->getProduits() === $this) {
                $prodCom->setProduits(null);
            }
        }

        return $this;
    }
}
