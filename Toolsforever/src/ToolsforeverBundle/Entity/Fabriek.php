<?php

namespace ToolsforeverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fabriek
 *
 * @ORM\Table(name="fabriek")
 * @ORM\Entity(repositoryClass="ToolsforeverBundle\Repository\FabriekRepository")
 */
class Fabriek
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Fabriek", type="string", length=255)
     */
    private $fabriek;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fabriek
     *
     * @param string $fabriek
     *
     * @return Fabriek
     */
    public function setFabriek($fabriek)
    {
        $this->fabriek = $fabriek;

        return $this;
    }

    /**
     * Get fabriek
     *
     * @return string
     */
    public function getFabriek()
    {
        return $this->fabriek;
    }
    public function __toString(){
        return $this->getFabriek();
    }
}
