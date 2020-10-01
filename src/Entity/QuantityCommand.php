<?php

namespace App\Entity;

use App\Repository\QuantityCommandRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuantityCommandRepository::class)
 */
class QuantityCommand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Paniers::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $panier;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="quantityCommands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $command;


    /* *************************************************************************/
    public function getId(): ?int
    {
        return $this->id;
    }

    /* *************************************************************************/
    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
    /* *************************************************************************/
    public function getPanier(): ?Paniers
    {
        return $this->panier;
    }

    public function setPanier(?Paniers $panier): self
    {
        $this->panier = $panier;

        return $this;
    }

    /* *************************************************************************/
    public function getCommand(): ?Commande
    {
        return $this->command;
    }

    public function setCommand(?Commande $command): self
    {
        $this->command = $command;

        return $this;
    }
}
