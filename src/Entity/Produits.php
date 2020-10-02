<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository", repositoryClass=ProduitsRepository::class)
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomProduit;

    /**
     * @ORM\ManyToOne(targetEntity=Producteurs::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $producteur;


    /* *************************************************************************/

    public function getId(): ?int
    {
        return $this->id;
    }

    /* *************************************************************************/

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /* *************************************************************************/

    public function getProducteur(): ?Producteurs
    {
        return $this->producteur;
    }

    public function setProducteur(?Producteurs $producteur): self
    {
        $this->producteur = $producteur;

        return $this;
    }


}
