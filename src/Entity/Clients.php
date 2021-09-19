<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Clients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ est requis.")
     * @Assert\Length(min=3, minMessage="Veuillez saisir au minimum 3 caractères.")
     */
    private $fullName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ est requis.")
     * @Assert\Length(min=3, minMessage="Veuillez saisir au minimum 3 caractères.")
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDocument::class, inversedBy="clients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Documents;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Ce champ est requis.")
     * @Assert\Length(min=10, minMessage="Veuillez saisir au minimum 10 caractères.")
     */
    private $DocumentValue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function PrePersist()
    {
        if (empty($this->createdAt)) {
            $this->createdAt = new \DateTimeImmutable();
        }

        if (empty($this->slug)) {
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->getFullName());
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDocuments(): ?TypeDocument
    {
        return $this->Documents;
    }

    public function setDocuments(?TypeDocument $Documents): self
    {
        $this->Documents = $Documents;

        return $this;
    }

    public function getDocumentValue(): ?string
    {
        return $this->DocumentValue;
    }

    public function setDocumentValue(string $DocumentValue): self
    {
        $this->DocumentValue = $DocumentValue;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
