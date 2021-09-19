<?php

namespace App\Entity;

use App\Repository\TypeDocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Clients::class, mappedBy="Documents")
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->TypeDocumentValue;
    }

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

    /**
     * @return Collection|Clients[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setDocuments($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getDocuments() === $this) {
                $client->setDocuments(null);
            }
        }

        return $this;
    }
}
