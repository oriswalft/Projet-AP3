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

    #[ORM\OneToMany(mappedBy: 'entrepot', targetEntity: Modulee::class)]
    private Collection $modulees;

    public function __construct()
    {
        $this->modulees = new ArrayCollection();
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
     * @return Collection<int, Modulee>
     */
    public function getModulees(): Collection
    {
        return $this->modulees;
    }

    public function addModulee(Modulee $modulee): static
    {
        if (!$this->modulees->contains($modulee)) {
            $this->modulees->add($modulee);
            $modulee->setEntrepot($this);
        }

        return $this;
    }

    public function removeModulee(Modulee $modulee): static
    {
        if ($this->modulees->removeElement($modulee)) {
            // set the owning side to null (unless already changed)
            if ($modulee->getEntrepot() === $this) {
                $modulee->setEntrepot(null);
            }
        }

        return $this;
    }
}
