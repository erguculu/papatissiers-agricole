<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="transaction")
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity=Farmer::class, mappedBy="transaction")
     */
    private $farmer;

    /**
     * @ORM\OneToMany(targetEntity=Buyer::class, mappedBy="transaction")
     */
    private $buyer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->farmer = new ArrayCollection();
        $this->buyer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setTransaction($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getTransaction() === $this) {
                $product->setTransaction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Farmer[]
     */
    public function getFarmer(): Collection
    {
        return $this->farmer;
    }

    public function addFarmer(Farmer $farmer): self
    {
        if (!$this->farmer->contains($farmer)) {
            $this->farmer[] = $farmer;
            $farmer->setTransaction($this);
        }

        return $this;
    }

    public function removeFarmer(Farmer $farmer): self
    {
        if ($this->farmer->removeElement($farmer)) {
            // set the owning side to null (unless already changed)
            if ($farmer->getTransaction() === $this) {
                $farmer->setTransaction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Buyer[]
     */
    public function getBuyer(): Collection
    {
        return $this->buyer;
    }

    public function addBuyer(Buyer $buyer): self
    {
        if (!$this->buyer->contains($buyer)) {
            $this->buyer[] = $buyer;
            $buyer->setTransaction($this);
        }

        return $this;
    }

    public function removeBuyer(Buyer $buyer): self
    {
        if ($this->buyer->removeElement($buyer)) {
            // set the owning side to null (unless already changed)
            if ($buyer->getTransaction() === $this) {
                $buyer->setTransaction(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
