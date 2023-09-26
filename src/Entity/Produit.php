<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
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
    private ?ProdCom $prodCom = null;

    #[ORM\ManyToMany(targetEntity: Rayon::class, mappedBy: 'produits')]
    private Collection $rayons;

    public function __construct()
    {
        $this->rayons = new ArrayCollection();
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

    public function getProdCom(): ?ProdCom
    {
        return $this->prodCom;
    }

    public function setProdCom(?ProdCom $prodCom): static
    {
        $this->prodCom = $prodCom;

        return $this;
    }

    /**
     * @return Collection<int, Rayon>
     */
    public function getRayons(): Collection
    {
        return $this->rayons;
    }

    public function addRayon(Rayon $rayon): static
    {
        if (!$this->rayons->contains($rayon)) {
            $this->rayons->add($rayon);
            $rayon->addProduit($this);
        }

        return $this;
    }

    public function removeRayon(Rayon $rayon): static
    {
        if ($this->rayons->removeElement($rayon)) {
            $rayon->removeProduit($this);
        }

        return $this;
    }
}
