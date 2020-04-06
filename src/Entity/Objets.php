<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjetsRepository")
 */
class Objets
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
    private $nomObjets;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textObjets;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $footerObjets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Types", inversedBy="objets")
     */
    private $TypeObjets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Types", inversedBy="ObjetsTypes")
     */
    private $typeObjets;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photos", mappedBy="objets")
     */
    private $photos;

    public function __construct()
    {
        $this->photosObjets = new ArrayCollection();
        $this->photoObjets = new ArrayCollection();
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomObjets(): ?string
    {
        return $this->nomObjets;
    }

    public function setNomObjets(string $nomObjets): self
    {
        $this->nomObjets = $nomObjets;

        return $this;
    }

    public function getTextObjets(): ?string
    {
        return $this->textObjets;
    }

    public function setTextObjets(?string $textObjets): self
    {
        $this->textObjets = $textObjets;

        return $this;
    }

    public function getFooterObjets(): ?string
    {
        return $this->footerObjets;
    }

    public function setFooterObjets(?string $footerObjets): self
    {
        $this->footerObjets = $footerObjets;

        return $this;
    }

    public function getTypeObjets(): ?Types
    {
        return $this->TypeObjets;
    }

    public function setTypeObjets(?Types $TypeObjets): self
    {
        $this->TypeObjets = $TypeObjets;

        return $this;
    }

    /**
     * @return Collection|Photos[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photos $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setObjets($this);
        }

        return $this;
    }

    public function removePhoto(Photos $photo): self
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
            // set the owning side to null (unless already changed)
            if ($photo->getObjets() === $this) {
                $photo->setObjets(null);
            }
        }

        return $this;
    }


}
