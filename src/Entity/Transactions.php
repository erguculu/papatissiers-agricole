<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transactions
 *
 * @ORM\Table(name="transactions")
 * @ORM\Entity(repositoryClass="App\Repository\TransactionsRepository")
 */
class Transactions
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
     * @var int
     *
     * @ORM\ManyToOne (targetEntity=Products::class, inversedBy="transactions")
     * @ORM\JoinColumn (nullable=false)
     */
    private $product;

    /**
     * @var int
     * @ORM\ManyToOne  (targetEntity=Farmers::class, inversedBy="transactions")
     * @ORM\JoinColumn  (nullable=false)
     */
    private $farmer;

    /**
     * @var int
     * @ORM\ManyToOne  (targetEntity=Buyers::class, inversedBy="transactions")
     * @ORM\JoinColumn (nullable=false)
     */
    private $buyer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="created_at", type="text", length=65535, nullable=true)
     */
    private $createdAt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var float|null
     *
     * @ORM\Column(name="quantity", type="float", precision=10, scale=0, nullable=true)
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getProduct(): int
    {
        return $this->product;
    }

    public function setProduct(?Products $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getFarmer(): int
    {
        return $this->farmer;
    }

    public function setFarmer(?Farmers $farmer): self
    {
        $this->farmer = $farmer;

        return $this;
    }

    public function getBuyer(): int
    {
        return $this->buyer;
    }

    public function setBuyer(?Buyers $buyer): self
    {
        $this->buyer = $buyer;

        return $this;
    }
}
