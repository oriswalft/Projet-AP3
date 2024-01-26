<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ModuleeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleeRepository::class)]
#[ApiResource()]
class Modulee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ilbelle = null;

    #[ORM\OneToMany(mappedBy: 'modulee', targetEntity: Rangee::class)]
    private Collection $rangee;

    #[ORM\ManyToOne(inversedBy: 'modulees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entrepot $entrepot = null;


    public function __construct()
    {
        $this->Rangee = new ArrayCollection();
        $this->rangee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIlbelle(): ?string
    {
        return $this->ilbelle;
    }

    public function setIlbelle(string $ilbelle): static
    {
        $this->ilbelle = $ilbelle;

        return $this;
    }

    /**
     * @return Collection<int, Rangee>
     */
    public function getRangee(): Collection
    {
        return $this->rangee;
    }

    public function addRangee(Rangee $rangee): static
    {
        if (!$this->rangee->contains($rangee)) {
            $this->rangee->add($rangee);
            $rangee->setModulee($this);
        }

        return $this;
    }

    public function removeRangee(Rangee $rangee): static
    {
        if ($this->rangee->removeElement($rangee)) {
            // set the owning side to null (unless already changed)
            if ($rangee->getModulee() === $this) {
                $rangee->setModulee(null);
            }
        }

        return $this;
    }

    public function getEntrepot(): ?Entrepot
    {
        return $this->entrepot;
    }

    public function setEntrepot(?Entrepot $entrepot): static
    {
        $this->entrepot = $entrepot;

        return $this;
    }
}
