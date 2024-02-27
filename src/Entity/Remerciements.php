<?php

namespace App\Entity;

use App\Repository\RemerciementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemerciementsRepository::class)]
class Remerciements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $duSalarie = null;

    #[ORM\Column(length: 255)]
    private ?string $pourSalarie = null;

    #[ORM\Column(length: 255)]
    private ?string $pourquoi = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDuSalarie(): ?string
    {
        return $this->duSalarie;
    }

    public function setDuSalarie(string $duSalarie): static
    {
        $this->duSalarie = $duSalarie;

        return $this;
    }

    public function getPourSalarie(): ?string
    {
        return $this->pourSalarie;
    }

    public function setPourSalarie(string $pourSalarie): static
    {
        $this->pourSalarie = $pourSalarie;

        return $this;
    }

    public function getPourquoi(): ?string
    {
        return $this->pourquoi;
    }

    public function setPourquoi(string $pourquoi): static
    {
        $this->pourquoi = $pourquoi;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

}