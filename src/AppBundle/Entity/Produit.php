<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie1
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="produit_id", type="string", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     *
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="art_cle", type="string", length=10, nullable=true)
     */
    private $artCle;

    /**
     * @var string
     *
     * @ORM\Column(name="const_ref", type="string", length=30, nullable=true)
     */
    private $constRef;

    /**
     * @var string
     *
     * @ORM\Column(name="const_ger", type="string", length=30, nullable=true)
     */
    private $constGar;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float",nullable=true)
     */
    private $poids;


    /**
     * @var string
     *
     * @ORM\Column(name="ean", type="string", length=20, nullable=true)
     */
    private $ean;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="part_number", type="string", length=20, nullable=true)
     */
    private $partNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=20, nullable=true)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="lib", type="string", length=20, nullable=true)
     */
    private $lib;

    /**
     * @var string
     *
     * @ORM\Column(name="prx_ht", type="float", nullable=true)
     */
    private $prxHt;

    /**
     * @var string
     *
     * @ORM\Column(name="prx_taxe", type="float", nullable=true)
     */
    private $prxTaxe;

    /**
     * @var string
     *
     * @ORM\Column(name="prx_public", type="float", nullable=true)
     */
    private $prxPublic;

    /**
     * @var string
     *
     * @ORM\Column(name="descrC", type="string", length=20, nullable=true)
     */
    private $descrC;

    /**
     * @var string
     *
     * @ORM\Column(name="descrL", type="string", length=20, nullable=true)
     */
    private $descrL;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorie4")
     * @ORM\JoinColumn(name="categorie4_id", referencedColumnName="id")
     */

    private $categorie4;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinTable(name="prodit_image",
     *      joinColumns={@ORM\JoinColumn(name="produit_id", referencedColumnName="produit_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Caracteristique", cascade={"persist"})
     * @ORM\JoinTable(name="produit_caracteristique",
     *      joinColumns={@ORM\JoinColumn(name="produit_id", referencedColumnName="produit_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="caracteristique_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $caracteristiques;


    /**
     * Constructor
     */
    public function __construct()
    {
        // $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->caracteristiques = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Produit
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get artCle
     *
     * @return string
     */
    public function getArtCle()
    {
        return $this->artCle;
    }

    /**
     * Set artCle
     *
     * @param string $artCle
     * @return Produit
     */
    public function setArtCle($artCle)
    {
        $this->artCle = $artCle;

        return $this;
    }

    /**
     * Get constRef
     *
     * @return string
     */
    public function getConstRef()
    {
        return $this->constRef;
    }

    /**
     * Set constRef
     *
     * @param string $constRef
     * @return Produit
     */
    public function setConstRef($constRef)
    {
        $this->constRef = $constRef;

        return $this;
    }

    /**
     * Get constGar
     *
     * @return string
     */
    public function getConstGar()
    {
        return $this->constGar;
    }

    /**
     * Set constGar
     *
     * @param string $constGar
     * @return Produit
     */
    public function setConstGar($constGar)
    {
        $this->constGar = $constGar;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set poids
     *
     * @param float $poids
     * @return Produit
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get ean
     *
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set ean
     *
     * @param string $ean
     * @return Produit
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Produit
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get partNumber
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Set partNumber
     *
     * @param string $partNumber
     * @return Produit
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set marque
     *
     * @param string $marque
     * @return Produit
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get lib
     *
     * @return string
     */
    public function getLib()
    {
        return $this->lib;
    }

    /**
     * Set lib
     *
     * @param string $lib
     * @return Produit
     */
    public function setLib($lib)
    {
        $this->lib = $lib;

        return $this;
    }

    /**
     * Get prxHt
     *
     * @return float
     */
    public function getPrxHt()
    {
        return $this->prxHt;
    }

    /**
     * Set prxHt
     *
     * @param float $prxHt
     * @return Produit
     */
    public function setPrxHt($prxHt)
    {
        $this->prxHt = $prxHt;

        return $this;
    }

    /**
     * Get prxTaxe
     *
     * @return float
     */
    public function getPrxTaxe()
    {
        return $this->prxTaxe;
    }

    /**
     * Set prxTaxe
     *
     * @param float $prxTaxe
     * @return Produit
     */
    public function setPrxTaxe($prxTaxe)
    {
        $this->prxTaxe = $prxTaxe;

        return $this;
    }

    /**
     * Get prxPublic
     *
     * @return float
     */
    public function getPrxPublic()
    {
        return $this->prxPublic;
    }

    /**
     * Set prxPublic
     *
     * @param float $prxPublic
     * @return Produit
     */
    public function setPrxPublic($prxPublic)
    {
        $this->prxPublic = $prxPublic;

        return $this;
    }

    /**
     * Get descrC
     *
     * @return string
     */
    public function getDescrC()
    {
        return $this->descrC;
    }

    /**
     * Set descrC
     *
     * @param string $descrC
     * @return Produit
     */
    public function setDescrC($descrC)
    {
        $this->descrC = $descrC;

        return $this;
    }

    /**
     * Get descrL
     *
     * @return string
     */
    public function getDescrL()
    {
        return $this->descrL;
    }


    /**
     * Set descrL
     *
     * @param string $descrL
     * @return DescL
     */
    public function setDescrL($descrL)
    {
        $this->descrL = $descrL;
    }


    /**
     * Add images
     *
     * @param \AppBundle\Entity\Image $images
     * @return Produit
     */
    public function addImage(\AppBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \AppBundle\Entity\Image $images
     */
    public function removeImage(\AppBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add caracteristiques
     *
     * @param \AppBundle\Entity\Caracteristique $caracteristiques
     * @return Produit
     */
    public function addCaracteristique(\AppBundle\Entity\Caracteristique $caracteristiques)
    {
        $this->caracteristiques[] = $caracteristiques;

        return $this;
    }

    /**
     * Remove caracteristiques
     *
     * @param \AppBundle\Entity\Caracteristique $caracteristiques
     */
    public function removeCaracteristique(\AppBundle\Entity\Caracteristique $caracteristiques)
    {
        $this->caracteristiques->removeElement($caracteristiques);
    }

    /**
     * Get caracteristiques
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCaracteristiques()
    {
        return $this->caracteristiques;
    }

    /**
     * Get categorie4
     *
     * @return \AppBundle\Entity\Categorie4
     */
    public function getCategorie4()
    {
        return $this->categorie4;
    }

    /**
     * Set categorie4
     *
     * @param \AppBundle\Entity\Categorie4 $categorie4
     * @return Produit
     */
    public function setCategorie4(\AppBundle\Entity\Categorie4 $categorie4 = null)
    {
        $this->categorie4 = $categorie4;

        return $this;
    }
}
