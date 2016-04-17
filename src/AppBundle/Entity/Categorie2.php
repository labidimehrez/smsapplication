<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie2
 *
 * @ORM\Table(name="categorie2")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Categorie2Repository")
 */
class Categorie2
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="string", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Categorie3", cascade={"persist"})
     * @ORM\JoinTable(name="categorie2_categorie3",
     *      joinColumns={@ORM\JoinColumn(name="categorie2_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categorie3_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $categories3;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories3 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param int id
     * @return Categorie2
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Categorie2
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add categories3
     *
     * @param \AppBundle\Categorie3 $categories3
     * @return Categorie2
     */
    public function addCategories3(\AppBundle\Entity\Categorie3 $categories3)
    {
        $this->categories3[] = $categories3;

        return $this;
    }

    /**
     * Remove categories3
     *
     * @param \AppBundle\Categorie3 $categories3
     */
    public function removeCategories3(\AppBundle\Entity\Categorie3 $categories3)
    {
        $this->categories3->removeElement($categories3);
    }

    /**
     * Get categories3
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories3()
    {
        return $this->categories3;
    }
}
