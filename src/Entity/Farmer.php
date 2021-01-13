<?php

namespace App\Entity;

use App\Repository\FarmerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FarmerRepository::class)
 */
class Farmer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registredAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $firstName;

    /**
     * @ORM\Column(type="integer")
     */
    private $lastName;

    /**
     * @ORM\Column(type="integer")
     */
    private $farmSize;

    /**
     * @ORM\ManyToOne(targetEntity=Transaction::class, inversedBy="farmer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transaction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?City
    {
        return $this->City;
    }

    public function setCity(?City $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getRegistredAt(): ?\DateTimeInterface
    {
        return $this->registredAt;
    }

    public function setRegistredAt(\DateTimeInterface $registredAt): self
    {
        $this->registredAt = $registredAt;

        return $this;
    }

    public function getFirstName(): ?int
    {
        return $this->firstName;
    }

    public function setFirstName(int $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?int
    {
        return $this->lastName;
    }

    public function setLastName(int $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFarmSize(): ?int
    {
        return $this->farmSize;
    }

    public function setFarmSize(int $farmSize): self
    {
        $this->farmSize = $farmSize;

        return $this;
    }

    public function getTransaction(): ?Transaction
    {
        return $this->transaction;
    }

    public function setTransaction(?Transaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }
}
