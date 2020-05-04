<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Frequency
 * @ORM\Entity(repositoryClass="App\Repository\FrequencyRepository")
 * @ORM\Table(name="frequency")
 * @ORM\Entity
 */
class Frequency
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="use_game", type="datetime", nullable=true)
     */
    private $useGame;

    /**
     * @var string|null
     *
     * @ORM\Column(name="game_round", type="string", length=255, nullable=true)
     */
    private $gameRound;

    /**
     * @var string|null
     *
     * @ORM\Column(name="score", type="string", length=255, nullable=true)
     */
    private $score;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Game", inversedBy="frequency")
     * @ORM\JoinTable(name="frequency_game",
     *   joinColumns={
     *     @ORM\JoinColumn(name="frequency_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     *   }
     * )
     */
    private $game;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->game = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUseGame(): ?\DateTimeInterface
    {
        return $this->useGame;
    }

    public function setUseGame(?\DateTimeInterface $useGame): self
    {
        $this->useGame = $useGame;

        return $this;
    }

    public function getGameRound(): ?string
    {
        return $this->gameRound;
    }

    public function setGameRound(?string $gameRound): self
    {
        $this->gameRound = $gameRound;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGame(): Collection
    {
        return $this->game;
    }

    public function addGame(Game $game): self
    {
        if (!$this->game->contains($game)) {
            $this->game[] = $game;
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->game->contains($game)) {
            $this->game->removeElement($game);
        }

        return $this;
    }

}
