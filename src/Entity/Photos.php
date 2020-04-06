<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotosRepository")
 */
class Photos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Types", mappedBy="photos", cascade={"persist", "remove"})
     */
    private $types;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Objets", inversedBy="photos")
     */
    private $objets;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function getTypes(): ?Types
    {
        return $this->types;
    }

    public function setTypes(Types $types): self
    {
        $this->types = $types;

        // set the owning side of the relation if necessary
        if ($types->getPhotos() !== $this) {
            $types->setPhotos($this);
        }

        return $this;
    }

    public function getObjets(): ?Objets
    {
        return $this->objets;
    }

    public function setObjets(?Objets $objets): self
    {
        $this->objets = $objets;

        return $this;
    }
}
