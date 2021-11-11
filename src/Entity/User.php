<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="Vous possedez déjà un compte")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Assert\Email(message = "Cette E-mail '{{ value }}' n'est pas valide.")
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Regex("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&-\/])[A-Za-z\d@$!%*#?&-\/]{8,}$/", message="Votre mot de passe doit contenir au moins un caractère minuscle, un caractère majuscule, un chiffre, un signe spécial de @#-_$%^&+=§ !? et entre 8 et 20 caractères")
     * @Assert\NotCompromisedPassword
     */
    private $password;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $FabArmes;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $FabArmures;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $Ingenierie;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $Joaillerie;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $ArtsObscurs;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $Cuisine;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $Ameublement;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $SwordShield;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $Lance;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $Arc;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $BatonFeu;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $Rapiere;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $HacheDouble;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $Mousquet;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $BatonVie;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $Hachette;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $MarteauDarmes;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "Votre niveau d'armes doit être entre {{ min }} et {{ max }}",)
     */
    private $GanteletsGlace;

    /**
     * @ORM\Column(type="integer", length=4, nullable=true)
     * @Assert\Positive
     */
    private $GearScore;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $StatFOR;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $StatDEX;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $StatINT;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $StatCONCEN;

    /**
     * @ORM\Column(type="integer", length=3, nullable=true)
     * @Assert\Positive
     */
    private $StatFORME;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $discordid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $spe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre nom de compagnie doit contenir minimum {{ limit }}",
     *      maxMessage = "Votre nom de compagnie doit contenir maximum {{ limit }}")
     */
    private $compagnie;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Choissisez Une Arme principale",
     *      maxMessage = "Merci de séléctionné une Arme principale")
     */
    private $FirstWeapon;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Choissisez Une Arme secondaire",
     *      maxMessage = "Merci de séléctionné une Arme secondaire")
     */
    private $SecondWeapon;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     * @Assert\Range(
     *      min = 1,
     *      max = 60,
     *      notInRangeMessage = "Votre niveau doit être entre {{ min }} et {{ max }}",)
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $TailleurDePierre;


    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFabArmes(): ?string
    {
        return $this->FabArmes;
    }

    public function setFabArmes(?string $FabArmes): self
    {
        $this->FabArmes = $FabArmes;

        return $this;
    }

    public function getFabArmures(): ?string
    {
        return $this->FabArmures;
    }

    public function setFabArmures(?string $FabArmures): self
    {
        $this->FabArmures = $FabArmures;

        return $this;
    }

    public function getIngenierie(): ?string
    {
        return $this->Ingenierie;
    }

    public function setIngenierie(string $Ingenierie): self
    {
        $this->Ingenierie = $Ingenierie;

        return $this;
    }

    public function getJoaillerie(): ?string
    {
        return $this->Joaillerie;
    }

    public function setJoaillerie(?string $Joaillerie): self
    {
        $this->Joaillerie = $Joaillerie;

        return $this;
    }

    public function getArtsObscurs(): ?string
    {
        return $this->ArtsObscurs;
    }

    public function setArtsObscurs(?string $ArtsObscurs): self
    {
        $this->ArtsObscurs = $ArtsObscurs;

        return $this;
    }

    public function getCuisine(): ?string
    {
        return $this->Cuisine;
    }

    public function setCuisine(string $Cuisine): self
    {
        $this->Cuisine = $Cuisine;

        return $this;
    }

    public function getAmeublement(): ?string
    {
        return $this->Ameublement;
    }

    public function setAmeublement(?string $Ameublement): self
    {
        $this->Ameublement = $Ameublement;

        return $this;
    }

    public function getSwordShield(): ?string
    {
        return $this->SwordShield;
    }

    public function setSwordShield(?string $SwordShield): self
    {
        $this->SwordShield = $SwordShield;

        return $this;
    }

    public function getLance(): ?string
    {
        return $this->Lance;
    }

    public function setLance(?string $Lance): self
    {
        $this->Lance = $Lance;

        return $this;
    }

    public function getArc(): ?string
    {
        return $this->Arc;
    }

    public function setArc(?string $Arc): self
    {
        $this->Arc = $Arc;

        return $this;
    }

    public function getBatonFeu(): ?string
    {
        return $this->BatonFeu;
    }

    public function setBatonFeu(?string $BatonFeu): self
    {
        $this->BatonFeu = $BatonFeu;

        return $this;
    }

    public function getRapiere(): ?string
    {
        return $this->Rapiere;
    }

    public function setRapiere(?string $Rapiere): self
    {
        $this->Rapiere = $Rapiere;

        return $this;
    }

    public function getHacheDouble(): ?string
    {
        return $this->HacheDouble;
    }

    public function setHacheDouble(?string $HacheDouble): self
    {
        $this->HacheDouble = $HacheDouble;

        return $this;
    }

    public function getMousquet(): ?string
    {
        return $this->Mousquet;
    }

    public function setMousquet(?string $Mousquet): self
    {
        $this->Mousquet = $Mousquet;

        return $this;
    }

    public function getBatonVie(): ?string
    {
        return $this->BatonVie;
    }

    public function setBatonVie(?string $BatonVie): self
    {
        $this->BatonVie = $BatonVie;

        return $this;
    }

    public function getHachette(): ?string
    {
        return $this->Hachette;
    }

    public function setHachette(?string $Hachette): self
    {
        $this->Hachette = $Hachette;

        return $this;
    }

    public function getMarteauDarmes(): ?string
    {
        return $this->MarteauDarmes;
    }

    public function setMarteauDarmes(?string $MarteauDarmes): self
    {
        $this->MarteauDarmes = $MarteauDarmes;

        return $this;
    }

    public function getGanteletsGlace(): ?string
    {
        return $this->GanteletsGlace;
    }

    public function setGanteletsGlace(?string $GanteletsGlace): self
    {
        $this->GanteletsGlace = $GanteletsGlace;

        return $this;
    }

    public function getGearScore(): ?string
    {
        return $this->GearScore;
    }

    public function setGearScore(?string $GearScore): self
    {
        $this->GearScore = $GearScore;

        return $this;
    }

    public function getStatFOR(): ?string
    {
        return $this->StatFOR;
    }

    public function setStatFOR(?string $StatFOR): self
    {
        $this->StatFOR = $StatFOR;

        return $this;
    }

    public function getStatDEX(): ?string
    {
        return $this->StatDEX;
    }

    public function setStatDEX(?string $StatDEX): self
    {
        $this->StatDEX = $StatDEX;

        return $this;
    }

    public function getStatINT(): ?string
    {
        return $this->StatINT;
    }

    public function setStatINT(?string $StatINT): self
    {
        $this->StatINT = $StatINT;

        return $this;
    }

    public function getStatCONCEN(): ?string
    {
        return $this->StatCONCEN;
    }

    public function setStatCONCEN(?string $StatCONCEN): self
    {
        $this->StatCONCEN = $StatCONCEN;

        return $this;
    }

    public function getStatFORME(): ?string
    {
        return $this->StatFORME;
    }

    public function setStatFORME(?string $StatFORME): self
    {
        $this->StatFORME = $StatFORME;

        return $this;
    }

    public function getDiscordid(): ?string
    {
        return $this->discordid;
    }

    public function setDiscordid(string $discordid): self
    {
        $this->discordid = $discordid;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getSpe(): ?string
    {
        return $this->spe;
    }

    public function setSpe(string $spe): self
    {
        $this->spe = $spe;

        return $this;
    }

    public function getCompagnie(): ?string
    {
        return $this->compagnie;
    }

    public function setCompagnie(string $compagnie): self
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    public function getFirstWeapon(): ?string
    {
        return $this->FirstWeapon;
    }

    public function setFirstWeapon(string $FirstWeapon): self
    {
        $this->FirstWeapon = $FirstWeapon;

        return $this;
    }

    public function getSecondWeapon(): ?string
    {
        return $this->SecondWeapon;
    }

    public function setSecondWeapon(string $SecondWeapon): self
    {
        $this->SecondWeapon = $SecondWeapon;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getTailleurDePierre(): ?int
    {
        return $this->TailleurDePierre;
    }

    public function setTailleurDePierre(int $TailleurDePierre): self
    {
        $this->TailleurDePierre = $TailleurDePierre;

        return $this;
    }
}
