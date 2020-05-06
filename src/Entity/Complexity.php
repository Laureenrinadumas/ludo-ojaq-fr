<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Complexity
 * @ORM\Entity(repositoryClass="App\Repository\ComplexityRepository")
 * @ORM\Table(name="complexity")
 * @ORM\Entity
 */
class Complexity
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
     * @var string|null
     *
     * @ORM\Column(name="name_level", type="string", length=255, nullable=true)
     */
    private $nameLevel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level;

    /**
     * @var string|null
     *
     * @ORM\Column(name="explanation", type="text", length=0, nullable=true)
     */
    private $explanation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameLevel(): ?string
    {
        return $this->nameLevel;
    }

    public function setNameLevel(?string $nameLevel): self
    {
        $this->nameLevel = $nameLevel;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    public function setExplanation(?string $explanation): self
    {
        $this->explanation = $explanation;

        return $this;
    }


}
