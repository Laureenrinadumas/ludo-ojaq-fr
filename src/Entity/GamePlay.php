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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Game", inversedBy="gamePlay")
     * @ORM\JoinTable(name="game_play_game",
     *   joinColumns={
     *     @ORM\JoinColumn(name="game_play_id", referencedColumnName="id")
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
