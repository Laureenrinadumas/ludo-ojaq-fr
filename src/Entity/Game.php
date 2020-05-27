<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
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
     * @var int|null
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string|null
     *
     * @ORM\Column(name="poster", type="string", length=255, nullable=true)
     */
    private $poster;

    /**
     * @ORM\Column(name="creation_date", type="date", length=255, nullable=true)
     */
    private $creationDate;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="games")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Complexity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="complexity_id", referencedColumnName="id")
     * })
     */
    private $complexity;

    /**
     * @ORM\ManyToMany(targetEntity="Frequency", mappedBy="game")
     */
    private $frequency;

    /**
     * @ORM\ManyToMany(targetEntity="GamePlay", mappedBy="games")
     */
    private $gamePlays;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $gameTimeMin;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $gameTimeMax;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberPlayerMin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberPlayerMax;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->frequency = new ArrayCollection();
        $this->gamePlays = new ArrayCollection();

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

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

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(?string $creationDate): self
    {
        try {
            $this->creationDate = new \DateTime($creationDate);
        } catch (\Exception $e) {
        };
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
    public function getGamePlays(): Collection
    {
        return $this->gamePlays;
    }

    public function addGamePlay(GamePlay $gamePlay): self
    {
        if (!$this->gamePlays->contains($gamePlay)) {
            $this->gamePlays[] = $gamePlay;
            $gamePlay->addGame($this);
        }

        return $this;
    }

    public function removeGamePlay(GamePlay $gamePlay): self
    {
        if ($this->gamePlays->contains($gamePlay)) {
            $this->gamePlays->removeElement($gamePlay);
            $gamePlay->removeGame($this);
        }

        return $this;
    }

    public function getGameTimeMin(): ?\DateTimeInterface
    {
        return $this->gameTimeMin;
    }

    public function setGameTimeMin(?\DateTimeInterface $gameTimeMin): self
    {
        $this->gameTimeMin = $gameTimeMin;

        return $this;
    }

    public function getGameTimeMax(): ?\DateTimeInterface
    {
        return $this->gameTimeMax;
    }

    public function setGameTimeMax(?\DateTimeInterface $gameTimeMax): self
    {
        $this->gameTimeMax = $gameTimeMax;

        return $this;
    }

    public function getNumberPlayerMin(): ?int
    {
        return $this->numberPlayerMin;
    }

    public function setNumberPlayerMin(?int $numberPlayerMin): self
    {
        $this->numberPlayerMin = $numberPlayerMin;

        return $this;
    }

    public function getNumberPlayerMax(): ?int
    {
        return $this->numberPlayerMax;
    }

    public function setNumberPlayerMax(?int $numberPlayerMax): self
    {
        $this->numberPlayerMax = $numberPlayerMax;

        return $this;
    }

}
