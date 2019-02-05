<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalesRepository")
 */
class Sales
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $saleZone;

    /**
     * @Assert\DateTime
     * @var string A "d-m-Y H:i:s" formatted value
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer")
     */
    private $customers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SaleType", inversedBy="sales")
     */
    private $saleTypes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="sales")
     */
    private $seller;

    // public function __construct()
    // {
    //     $this->saleTypes = 1;
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaleZone(): ?string
    {
        return $this->saleZone;
    }

    public function setSaleZone(?string $saleZone): self
    {
        $this->saleZone = $saleZone;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCustomers(): ?Customer
    {
        return $this->customers;
    }

    public function setCustomers(?Customer $customers): self
    {
        $this->customers = $customers;

        return $this;
    }

    public function getSaleTypes(): ?SaleType
    {
        return $this->saleTypes;
    }

    public function setSaleTypes(?SaleType $saleTypes): self
    {
        $this->saleTypes = $saleTypes;

        return $this;
    }

    public function getSeller(): ?User
    {
        return $this->seller;
    }

    public function setSeller(?User $seller): self
    {
        $this->seller = $seller;

        return $this;
    }

}
