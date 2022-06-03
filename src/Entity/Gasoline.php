<?php

namespace App\Entity;

use App\Repository\GasolineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GasolineRepository::class)]
class Gasoline
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $gasoil;

    #[ORM\Column(type: 'float')]
    private $gpl;

    #[ORM\Column(type: 'float')]
    private $ethanol;

    #[ORM\ManyToOne(targetEntity: Shop::class, inversedBy: 'gasolines')]
    private $shop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGasoil(): ?float
    {
        return $this->gasoil;
    }

    public function setGasoil(float $gasoil): self
    {
        $this->gasoil = $gasoil;

        return $this;
    }

    public function getGpl(): ?float
    {
        return $this->gpl;
    }

    public function setGpl(float $gpl): self
    {
        $this->gpl = $gpl;

        return $this;
    }

    public function getEthanol(): ?float
    {
        return $this->ethanol;
    }

    public function setEthanol(float $ethanol): self
    {
        $this->ethanol = $ethanol;

        return $this;
    }

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): self
    {
        $this->shop = $shop;

        return $this;
    }
}
