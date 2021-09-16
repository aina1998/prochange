<?php

namespace App\Entity;

use App\Repository\TvaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TvaRepository::class)
 * @UniqueEntity("TauxValue", message="Cette valeur éxiste déja dans la base de données.")
 */
class Tva
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
    private $TauxValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTauxValue(): ?float
    {
        return $this->TauxValue;
    }

    public function setTauxValue(float $TauxValue): self
    {
        $this->TauxValue = $TauxValue;

        return $this;
    }
}
