<?php

namespace App\Entity;

use App\Repository\CraftRequestRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CraftRequestRepository::class)
 */
class CraftRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=255)
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 1,
     *      max = 8,
     *      minMessage = "Votre Prix doit avoir minimum {{ limit }} characters",
     *      maxMessage = "Votre Prix doit avoir maximum {{ limit }} characters")
     * @Assert\NotBlank
     */
    private $details;

    /**
     * @ORM\Column(type="boolean")
     */
    private $checkOrNot;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=60)
     * @Assert\NotBlank
     */
    private $nameUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=2,max=60)
     * @Assert\NotBlank
     */
    private $farmeur;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Length(
     *      min = 1,
     *      max = 8,
     *      minMessage = "Votre Quantité doit avoir minimum {{ limit }} characters",
     *      maxMessage = "Votre Quantité doit avoir maximum {{ limit }} characters")
     * @Assert\NotBlank
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getCheckOrNot(): ?bool
    {
        return $this->checkOrNot;
    }

    public function setCheckOrNot(bool $checkOrNot): self
    {
        $this->checkOrNot = $checkOrNot;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getNameUser(): ?string
    {
        return $this->nameUser;
    }

    public function setNameUser(string $nameUser): self
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    public function getFarmeur(): ?string
    {
        return $this->farmeur;
    }

    public function setFarmeur(string $farmeur): self
    {
        $this->farmeur = $farmeur;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
