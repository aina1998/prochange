<?php

namespace App\Entity;

use App\Repository\DeviseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DeviseRepository::class)
 * @UniqueEntity("DeviseValue", message="Cette valeur éxiste déja dans la base de données.")
 */
class Devise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Ce champ est requis.")
     */
    private $DeviseValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeviseValue(): ?string
    {
        return $this->DeviseValue;
    }

    public function setDeviseValue(string $DeviseValue): self
    {
        $this->DeviseValue = $DeviseValue;

        return $this;
    }
}
