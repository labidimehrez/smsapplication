<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie1
 *
 * @ORM\Table(name="categorie1")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Categorie1Repository")
 */
class Categorie1
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Categorie2", cascade={"persist"})
     * @ORM\JoinTable(name="categorie1_categorie2",
     *      joinColumns={@ORM\JoinColumn(name="categorie1_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categorie2_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $categories2;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories2 = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Categorie1
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
     * @return Categorie1
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add categories2
     *
     * @param \AppBundle\Categorie2 $categories2
     * @return Categorie1
     */
    public function addCategories2(\AppBundle\Entity\Categorie2 $categories2)
    {
        $this->categories2[] = $categories2;

        return $this;
    }

    /**
     * Remove categories2
     *
     * @param \AppBundle\Categorie2 $categories2
     */
    public function removeCategories2(\AppBundle\Entity\Categorie2 $categories2)
    {
        $this->categories2->removeElement($categories2);
    }

    /**
     * Get categories2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories2()
    {
        return $this->categories2;
    }
}
