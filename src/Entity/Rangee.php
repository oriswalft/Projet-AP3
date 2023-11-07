<?php

namespace App\Entity;

use App\Repository\RangeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RangeeRepository::class)]
class Rangee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'rangee')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Modulee $modulee = null;

    #[ORM\OneToMany(mappedBy: 'rangee', targetEntity: Section::class)]
    private Collection $section;

    public function __construct()
    {
        $this->section = new ArrayCollection();
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

    public function getModulee(): ?Modulee
    {
        return $this->modulee;
    }

    public function setModulee(?Modulee $modulee): static
    {
        $this->modulee = $modulee;

        return $this;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getSection(): Collection
    {
        return $this->section;
    }

    public function addSection(Section $section): static
    {
        if (!$this->section->contains($section)) {
            $this->section->add($section);
            $section->setRangee($this);
        }

        return $this;
    }

    public function removeSection(Section $section): static
    {
        if ($this->section->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getRangee() === $this) {
                $section->setRangee(null);
            }
        }

        return $this;
    }
}
