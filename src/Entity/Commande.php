<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository", repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="float")
     */
    private $prixTotal;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $retrait;

    /**
     * @ORM\OneToMany(targetEntity=QuantityCommand::class, mappedBy="command", orphanRemoval=true)
     */
    private $quantityCommands;

    public function __construct()
    {
        $this->quantityCommands = new ArrayCollection();
    }

    /* *************************************************************************/
    public function getId(): ?int
    {
        return $this->id;
    }

    /* *************************************************************************/

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /* *************************************************************************/

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /* *************************************************************************/

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /* *************************************************************************/

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /* *************************************************************************/

    public function getRetrait(): ?string
    {
        return $this->retrait;
    }

    public function setRetrait(string $retrait): self
    {
        $this->retrait = $retrait;

        return $this;
    }

    /* *************************************************************************/

    /**
     * @return Collection|QuantityCommand[]
     */
    public function getQuantityCommands(): Collection
    {
        return $this->quantityCommands;
    }

    public function addQuantityCommand(QuantityCommand $quantityCommand): self
    {
        if (!$this->quantityCommands->contains($quantityCommand)) {
            $this->quantityCommands[] = $quantityCommand;
            $quantityCommand->setCommand($this);
        }

        return $this;
    }

    public function removeQuantityCommand(QuantityCommand $quantityCommand): self
    {
        if ($this->quantityCommands->contains($quantityCommand)) {
            $this->quantityCommands->removeElement($quantityCommand);
            // set the owning side to null (unless already changed)
            if ($quantityCommand->getCommand() === $this) {
                $quantityCommand->setCommand(null);
            }
        }

        return $this;
    }

}
