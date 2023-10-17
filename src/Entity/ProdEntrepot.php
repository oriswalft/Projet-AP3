<?php

namespace App\Entity;

use App\Repository\ProdEntrepotRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProdEntrepotRepository::class)]
class ProdEntrepot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Module = null;

    #[ORM\Column(length: 255)]
    private ?string $Rangee = null;

    #[ORM\Column(length: 255)]
    private ?string $Section = null;

    #[ORM\Column(length: 255)]
    private ?string $Etagere = null;

    #[ORM\Column]
    private ?int $QuantiteeProduits = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModule(): ?string
    {
        return $this->Module;
    }

    public function setModule(string $Module): static
    {
        $this->Module = $Module;

        return $this;
    }

    public function getRangee(): ?string
    {
        return $this->Rangee;
    }

    public function setRangee(string $Rangee): static
    {
        $this->Rangee = $Rangee;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->Section;
    }

    public function setSection(string $Section): static
    {
        $this->Section = $Section;

        return $this;
    }

    public function getEtagere(): ?string
    {
        return $this->Etagere;
    }

    public function setEtagere(string $Etagere): static
    {
        $this->Etagere = $Etagere;

        return $this;
    }

    public function getQuantiteeProduits(): ?int
    {
        return $this->QuantiteeProduits;
    }

    public function setQuantiteeProduits(int $QuantiteeProduits): static
    {
        $this->QuantiteeProduits = $QuantiteeProduits;

        return $this;
    }
}
