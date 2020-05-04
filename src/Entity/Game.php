<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game", indexes={@ORM\Index(name="IDX_232B318CDAC7F446", columns={"complexity_id"}), @ORM\Index(name="IDX_232B318C12469DE2", columns={"category_id"}), @ORM\Index(name="IDX_232B318CA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class Game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="rule", type="text", length=0, nullable=false)
     */
    private $rule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="game_time", type="datetime", nullable=false)
     */
    private $gameTime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var int|null
     *
     * @ORM\Column(name="number_player", type="integer", nullable=true)
     */
    private $numberPlayer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="poster", type="string", length=255, nullable=true)
     */
    private $poster;

    /**
     * @var string|null
     *
     * @ORM\Column(name="creation_date", type="string", length=255, nullable=true)
     */
    private $creationDate;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Complexity
     *
     * @ORM\ManyToOne(targetEntity="Complexity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="complexity_id", referencedColumnName="id")
     * })
     */
    private $complexity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Frequency", mappedBy="game")
     */
    private $frequency;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="GamePlay", mappedBy="game")
     */
    private $gamePlay;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->frequency = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gamePlay = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRule(): ?string
    {
        return $this->rule;
    }

    public function setRule(string $rule): self
    {
        $this->rule = $rule;

        return $this;
    }

    public function getGameTime(): ?\DateTimeInterface
    {
        return $this->gameTime;
    }

    public function setGameTime(\DateTimeInterface $gameTime): self
    {
        $this->gameTime = $gameTime;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getNumberPlayer(): ?int
    {
        return $this->numberPlayer;
    }

    public function setNumberPlayer(?int $numberPlayer): self
    {
        $this->numberPlayer = $numberPlayer;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getCreationDate(): ?string
    {
        return $this->creationDate;
    }

    public function setCreationDate(?string $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getComplexity(): ?Complexity
    {
        return $this->complexity;
    }

    public function setComplexity(?Complexity $complexity): self
    {
        $this->complexity = $complexity;

        return $this;
    }

    /**
     * @return Collection|Frequency[]
     */
    public function getFrequency(): Collection
    {
        return $this->frequency;
    }

    public function addFrequency(Frequency $frequency): self
    {
        if (!$this->frequency->contains($frequency)) {
            $this->frequency[] = $frequency;
            $frequency->addGame($this);
        }

        return $this;
    }

    public function removeFrequency(Frequency $frequency): self
    {
        if ($this->frequency->contains($frequency)) {
            $this->frequency->removeElement($frequency);
            $frequency->removeGame($this);
        }

        return $this;
    }

    /**
     * @return Collection|GamePlay[]
     */
    public function getGamePlay(): Collection
    {
        return $this->gamePlay;
    }

    public function addGamePlay(GamePlay $gamePlay): self
    {
        if (!$this->gamePlay->contains($gamePlay)) {
            $this->gamePlay[] = $gamePlay;
            $gamePlay->addGame($this);
        }

        return $this;
    }

    public function removeGamePlay(GamePlay $gamePlay): self
    {
        if ($this->gamePlay->contains($gamePlay)) {
            $this->gamePlay->removeElement($gamePlay);
            $gamePlay->removeGame($this);
        }

        return $this;
    }

}
