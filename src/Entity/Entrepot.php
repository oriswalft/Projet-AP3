<?php

namespace App\Entity;

use App\Repository\EntrepotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepotRepository::class)]
class Entrepot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\OneToMany(mappedBy: 'relation', targetEntity: ProdEntrepot::class)]
    private Collection $prodEntrepots;

    public function __construct()
    {
        $this->prodEntrepots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, ProdEntrepot>
     */
    public function getProdEntrepots(): Collection
    {
        return $this->prodEntrepots;
    }

    public function addProdEntrepot(ProdEntrepot $prodEntrepot): static
    {
        if (!$this->prodEntrepots->contains($prodEntrepot)) {
            $this->prodEntrepots->add($prodEntrepot);
            $prodEntrepot->setRelation($this);
        }

        return $this;
    }

    public function removeProdEntrepot(ProdEntrepot $prodEntrepot): static
    {
        if ($this->prodEntrepots->removeElement($prodEntrepot)) {
            // set the owning side to null (unless already changed)
            if ($prodEntrepot->getRelation() === $this) {
                $prodEntrepot->setRelation(null);
            }
        }

        return $this;
    }
}
