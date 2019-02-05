<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 * @UniqueEntity("email")
 */
class Customer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * 
     * @Assert\NotBlank(
     * message = "Merci de renseigner ce champ !"  
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @Assert\NotBlank(
     * message = "Merci de renseigner ce champ !"   
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * 
     * @Assert\NotBlank(
     * message = "Merci de renseigner ce champ !"   
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @Assert\NotBlank(
     * message = "Merci de renseigner ce champ !"   
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zipCode;

    /**
     * @Assert\NotBlank(
     * message = "Merci de renseigner ce champ !"   
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @Assert\NotBlank(
     * message = "Merci de renseigner ce champ !"   
     * )
     * @ORM\Column(type="string", length=80, nullable=true, unique=true)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
