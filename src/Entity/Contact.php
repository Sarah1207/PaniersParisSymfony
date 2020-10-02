<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\Email()
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide.")
     * @Assert\Length(
     *     min="2",
     *     max="450",
     *     minMessage="Votre commentaire doit au minimum comprendre 2 caractères",
     *     maxMessage="Votre commentaire ne peut dépasser 450 caractères"
     * )
     * @ORM\Column(type="text")
     */
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
