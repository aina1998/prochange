<?php

namespace App\Entity;

use App\Repository\ExchangeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ExchangeRepository::class)
 * @UniqueEntity("ExchangeValue", message="Cette valeur éxiste déja dans la base de données.")
 */
class Exchange
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Ce champ est requis.")
     */
    private $ExchangeValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExchangeValue(): ?float
    {
        return $this->ExchangeValue;
    }

    public function setExchangeValue(float $ExchangeValue): self
    {
        $this->ExchangeValue = $ExchangeValue;

        return $this;
    }
}
