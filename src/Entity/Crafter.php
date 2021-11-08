<?php

namespace App\Entity;

use App\Repository\CrafterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CrafterRepository::class)
 */
class Crafter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CraftAndNiveau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DiscId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getCraftAndNiveau(): ?string
    {
        return $this->CraftAndNiveau;
    }

    public function setCraftAndNiveau(string $CraftAndNiveau): self
    {
        $this->CraftAndNiveau = $CraftAndNiveau;

        return $this;
    }

    public function getDiscId(): ?string
    {
        return $this->DiscId;
    }

    public function setDiscId(string $DiscId): self
    {
        $this->DiscId = $DiscId;

        return $this;
    }
}
