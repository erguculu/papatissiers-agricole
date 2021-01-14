<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cities
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="App\Repository\CitiesRepository")
 */
class Cities
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
     * @var int|null
     *
     * @ORM\Column(name="zipcode", type="string", length=50, nullable=true)
     */
    private $zipcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="text", length=65535, nullable=true)
     */
    private $city;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=true)
     */
    private $lat;

    /**
     * @var float|null
     *
     * @ORM\Column(name="long", type="float", precision=10, scale=0, nullable=true)
     */
    private $long;

    /**
     * @var int|null
     *
     * @ORM\Column(name="insee_code", type="string", length=50, nullable=true)
     */
    private $inseeCode;

    /**
     * @ORM\OneToMany(targetEntity=Buyers::class, mappedBy="city")
     */
    private $buyers;

    /**
     * @ORM\OneToMany (targetEntity=Farmers::class, mappedBy="city")
     */
    private $farmers;

    public function __construct()
    {
        $this->buyers = new ArrayCollection();
        $this->farmers = new ArrayCollection();
    }

    /**
     * @return Collection|Buyers[]
     */
    public function getBuyers(): Collection
    {
        return $this->buyers;
    }

    public function addBuyer(Buyers $buyer): self
    {
        if (!$this->buyers->contains($buyer)) {
            $this->buyers[] = $buyer;
            $buyer->setCity($this);
        }

        return $this;
    }

    public function removeBuyer(Buyers $buyer): self
    {
        if ($this->buyers->removeElement($buyer)) {
            // set the owning side to null (unless already changed)
            if ($buyer->getCity() === $this) {
                $buyer->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Farmers[]
     */
    public function getFarmers(): Collection
    {
        return $this->farmers;
    }

    public function addFarmer(Farmers $farmer): self
    {
        if (!$this->farmers->contains($farmer)) {
            $this->farmers[] = $farmer;
            $farmer->setCity($this);
        }

        return $this;
    }

    public function removeFarmer(Farmers $farmer): self
    {
        if ($this->farmers->removeElement($farmer)) {
            // set the owning side to null (unless already changed)
            if ($farmer->getCity() === $this) {
                $farmer->setCity(null);
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLong(): ?float
    {
        return $this->long;
    }

    public function setLong(?float $long): self
    {
        $this->long = $long;

        return $this;
    }

    public function getInseeCode(): ?int
    {
        return $this->inseeCode;
    }

    public function setInseeCode(?int $inseeCode): self
    {
        $this->inseeCode = $inseeCode;

        return $this;
    }
}

