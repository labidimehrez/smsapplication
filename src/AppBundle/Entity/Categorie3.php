<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie2
 *
 * @ORM\Table(name="categorie3")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Categorie3Repository")
 */
class Categorie3
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Categorie4", cascade={"persist"})
     * @ORM\JoinTable(name="categorie3_categorie4",
     *      joinColumns={@ORM\JoinColumn(name="categorie3_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categorie4_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $categories4;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories4 = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Categorie3
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
     * @return Categorie3
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add categories4
     *
     * @param \AppBundle\Categorie4 $categories4
     * @return Categorie3
     */
    public function addCategories4(\AppBundle\Entity\Categorie4 $categories4)
    {
        $this->categories4[] = $categories4;

        return $this;
    }

    /**
     * Remove categories4
     *
     * @param \AppBundle\Categorie4 $categories4
     */
    public function removeCategories4(\AppBundle\Entity\Categorie4 $categories4)
    {
        $this->categories4->removeElement($categories4);
    }

    /**
     * Get categories4
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories4()
    {
        return $this->categories4;
    }
}
