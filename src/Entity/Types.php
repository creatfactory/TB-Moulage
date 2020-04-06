<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypesRepository")
 */
class Types
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
    private $nomTypes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreTypes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitreTypes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $textTypes;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objets", mappedBy="TypeObjets")
     */
    private $objets;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objets", mappedBy="typeObjets")
     */
    private $ObjetsTypes;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Photos", inversedBy="types", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $photos;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
        $this->ObjetsTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypes(): ?string
    {
        return $this->nomTypes;
    }

    public function setNomTypes(string $nomTypes): self
    {
        $this->nomTypes = $nomTypes;

        return $this;
    }

    public function getTitreTypes(): ?string
    {
        return $this->titreTypes;
    }

    public function setTitreTypes(?string $titreTypes): self
    {
        $this->titreTypes = $titreTypes;

        return $this;
    }

    public function getSousTitreTypes(): ?string
    {
        return $this->sousTitreTypes;
    }

    public function setSousTitreTypes(?string $sousTitreTypes): self
    {
        $this->sousTitreTypes = $sousTitreTypes;

        return $this;
    }

   
    public function getTextTypes(): ?string
    {
        return $this->textTypes;
    }

    public function setTextTypes(?string $textTypes): self
    {
        $this->textTypes = $textTypes;

        return $this;
    }

    /**
     * @return Collection|Objets[]
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(Objets $objet): self
    {
        if (!$this->objets->contains($objet)) {
            $this->objets[] = $objet;
            $objet->setTypeObjets($this);
        }

        return $this;
    }

    public function removeObjet(Objets $objet): self
    {
        if ($this->objets->contains($objet)) {
            $this->objets->removeElement($objet);
            // set the owning side to null (unless already changed)
            if ($objet->getTypeObjets() === $this) {
                $objet->setTypeObjets(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Objets[]
     */
    public function getObjetsTypes(): Collection
    {
        return $this->ObjetsTypes;
    }

    public function addObjetsType(Objets $objetsType): self
    {
        if (!$this->ObjetsTypes->contains($objetsType)) {
            $this->ObjetsTypes[] = $objetsType;
            $objetsType->setTypeObjets($this);
        }

        return $this;
    }

    public function removeObjetsType(Objets $objetsType): self
    {
        if ($this->ObjetsTypes->contains($objetsType)) {
            $this->ObjetsTypes->removeElement($objetsType);
            // set the owning side to null (unless already changed)
            if ($objetsType->getTypeObjets() === $this) {
                $objetsType->setTypeObjets(null);
            }
        }

        return $this;
    }

    public function getPhotos(): ?Photos
    {
        return $this->photos;
    }

    public function setPhotos(Photos $photos): self
    {
        $this->photos = $photos;

        return $this;
    }
}
