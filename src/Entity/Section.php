<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
#[ApiResource()]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'section')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rangee $rangee = null;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: Etagere::class)]
    private Collection $etagere;

    public function __construct()
    {
        $this->etagere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getRangee(): ?Rangee
    {
        return $this->rangee;
    }

    public function setRangee(?Rangee $rangee): static
    {
        $this->rangee = $rangee;

        return $this;
    }

    /**
     * @return Collection<int, Etagere>
     */
    public function getEtagere(): Collection
    {
        return $this->etagere;
    }

    public function addEtagere(Etagere $etagere): static
    {
        if (!$this->etagere->contains($etagere)) {
            $this->etagere->add($etagere);
            $etagere->setSection($this);
        }

        return $this;
    }

    public function removeEtagere(Etagere $etagere): static
    {
        if ($this->etagere->removeElement($etagere)) {
            // set the owning side to null (unless already changed)
            if ($etagere->getSection() === $this) {
                $etagere->setSection(null);
            }
        }

        return $this;
    }
}
