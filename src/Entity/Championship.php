<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChampionshipRepository")
 * @ORM\Table("turnier")
 */
class Championship
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="order")
     */
    private $nr;

    /**
     * @ORM\Column(type="string", length=255, name="title")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $completed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNr(): ?int
    {
        return $this->nr;
    }

    public function setNr(int $nr): self
    {
        $this->nr = $nr;

        return $this;
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

    public function getSlug(): ?string
    {
        return $this->slug ?? $this->slugifyName();
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCompleted(): ?bool
    {
        return $this->completed ?? false;
    }

    public function setCompleted(?bool $completed): self
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * @param string $name
     * @return string
     */
    private function slugifyName()
    {
        $nameParts = ['/^H.+ /' => 'hr', '/^R.+ /' => 'rr', '/^E. /' => 'em', '/^W. /' => 'wm'];
        $patterns = array_keys($nameParts);
        $replacements = array_values($nameParts);

        $slug = preg_replace($patterns, $replacements, $this->name);
        return preg_replace('/^(\w\w).*(\d\d)\/(\d\d)?$/', '$1$2$3', $slug);
    }
}
