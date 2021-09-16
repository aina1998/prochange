<?php

namespace App\Entity;

use App\Repository\TypeDocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TypeDocumentRepository::class)
 * @UniqueEntity("TypeDocumentValue", message="Cette valeur éxiste déja dans la base de données.")
 */
class TypeDocument
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Ce champ est requis.")
     */
    private $TypeDocumentValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDocumentValue(): ?string
    {
        return $this->TypeDocumentValue;
    }

    public function setTypeDocumentValue(string $TypeDocumentValue): self
    {
        $this->TypeDocumentValue = $TypeDocumentValue;

        return $this;
    }
}
