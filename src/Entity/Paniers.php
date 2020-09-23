<?php

namespace App\Entity;

use App\Repository\PaniersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaniersRepository::class)
 */
class Paniers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomPanier;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionPanier;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixPanier;

    /**
     * @ORM\Column(type="float")
     */
    private $poidsPanier;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="text")
     */
    private $composition;



    ///////////////////////////////////////////////////////////

    public function getId(): ?int
    {
        return $this->id;
    }

    //////////////////////////////////////////////////////////////
    public function getNomPanier(): ?string
    {
        return $this->nomPanier;
    }

    public function setNomPanier(string $nomPanier): self
    {
        $this->nomPanier = $nomPanier;

        return $this;
    }
    ///////////////////////////////////////////////////////////////
    public function getDescriptionPanier(): ?string
    {
        return $this->descriptionPanier;
    }

    public function setDescriptionPanier(string $descriptionPanier): self
    {
        $this->descriptionPanier = $descriptionPanier;

        return $this;
    }
    /////////////////////////////////////////////////////////////////

    public function getPrixPanier(): ?int
    {
        return $this->prixPanier;
    }

    public function setPrixPanier(int $prixPanier): self
    {
        $this->prixPanier = $prixPanier;

        return $this;
    }
    ///////////////////////////////////////////////////////////////////
    public function getPoidsPanier(): ?float
    {
        return $this->poidsPanier;
    }

    public function setPoidsPanier(float $poidsPanier): self
    {
        $this->poidsPanier = $poidsPanier;

        return $this;
    }
    /////////////////////////////////////////////////////////////////////
    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    ///////////////////////////////////////////////////////////////////////////////
    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }




}
