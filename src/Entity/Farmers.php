<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Farmers
 *
 * @ORM\Table(name="farmers")
 * @ORM\Entity(repositoryClass="App\Repository\FarmersRepository")
 */
class Farmers
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
     * @ORM\ManyToOne (targetEntity=Cities::class, inversedBy="farmers")
     * @ORM\JoinColumn (nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="registered_at", type="text", length=65535, nullable=true)
     */
    private $registeredAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="text", length=65535, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="text", length=65535, nullable=true)
     */
    private $lastName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="farm_size", type="integer", nullable=true)
     */
    private $farmSize;

    /**
     * @ORM\OneToMany (targetEntity=Transactions::class, mappedBy="farmers")
     */
    private $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    /**
     * @return Collection|Transactions[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transactions $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setFarmer($this);
        }

        return $this;
    }

    public function removeTransaction(Transactions $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getFarmer() === $this) {
                $transaction->setFarmer(null);
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegisteredAt(): ?string
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(?string $registeredAt): self
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFarmSize(): ?int
    {
        return $this->farmSize;
    }

    public function setFarmSize(?int $farmSize): self
    {
        $this->farmSize = $farmSize;

        return $this;
    }

    public function getCity(): ?Cities
    {
        return $this->city;
    }

    public function setCity(?Cities $city): self
    {
        $this->city = $city;

        return $this;
    }
}
