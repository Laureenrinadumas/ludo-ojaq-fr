<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * GamePlay
 * @ORM\Entity(repositoryClass="App\Repository\GamePlayRepository")
 * @ORM\Table(name="game_play")
 * @ORM\Entity
 */
class GamePlay
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
     * @ORM\Column(name="name_play", type="string", length=255, nullable=false)
     */
    private $namePlay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="definition", type="text", length=0, nullable=true)
     */
    private $definition;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Game", inversedBy="gamePlay")
     */
    private $games;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->games = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePlay(): ?string
    {
        return $this->namePlay;
    }

    public function setNamePlay(string $namePlay): self
    {
        $this->namePlay = $namePlay;

        return $this;
    }

    public function getDefinition(): ?string
    {
        return $this->definition;
    }

    public function setDefinition(?string $definition): self
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->contains($game)) {
            $this->games->removeElement($game);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->namePlay;
    }
}
