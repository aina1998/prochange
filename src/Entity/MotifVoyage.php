<?php

namespace App\Entity;

use App\Repository\MotifVoyageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MotifVoyageRepository::class)
 * @UniqueEntity("MotifVoyageValue", message="Cette valeur es déja dans la base de données.")
 */
class MotifVoyage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Ce champ est requis.")
     */
    private $MotifVoyageValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotifVoyageValue(): ?string
    {
        return $this->MotifVoyageValue;
    }

    public function setMotifVoyageValue(string $MotifVoyageValue): self
    {
        $this->MotifVoyageValue = $MotifVoyageValue;

        return $this;
    }
}
