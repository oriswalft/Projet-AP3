<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatRepository::class)]
class Etat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $transmise = null;

    #[ORM\Column]
    private ?bool $validee = null;

    #[ORM\Column]
    private ?bool $preparation = null;

    #[ORM\Column]
    private ?bool $expediee = null;

    #[ORM\Column]
    private ?bool $livree = null;

    #[ORM\Column]
    private ?bool $retiree = null;

    #[ORM\OneToMany(mappedBy: 'etat', targetEntity: Commande::class)]
    private Collection $commandes;

  

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isTransmise(): ?bool
    {
        return $this->transmise;
    }

    public function setTransmise(bool $transmise): static
    {
        $this->transmise = $transmise;

        return $this;
    }

    public function isValidee(): ?bool
    {
        return $this->validee;
    }

    public function setValidee(bool $validee): static
    {
        $this->validee = $validee;

        return $this;
    }

    public function isPreparation(): ?bool
    {
        return $this->preparation;
    }

    public function setPreparation(bool $preparation): static
    {
        $this->preparation = $preparation;

        return $this;
    }

    public function isExpediee(): ?bool
    {
        return $this->expediee;
    }

    public function setExpediee(bool $expediee): static
    {
        $this->expediee = $expediee;

        return $this;
    }

    public function isLivree(): ?bool
    {
        return $this->livree;
    }

    public function setLivree(bool $livree): static
    {
        $this->livree = $livree;

        return $this;
    }

    public function isRetiree(): ?bool
    {
        return $this->retiree;
    }

    public function setRetiree(bool $retiree): static
    {
        $this->retiree = $retiree;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setEtat($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getEtat() === $this) {
                $commande->setEtat(null);
            }
        }

        return $this;
    }

    
}
