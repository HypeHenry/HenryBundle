<?php

namespace ToolsforeverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locatie
 *
 * @ORM\Table(name="locatie")
 * @ORM\Entity(repositoryClass="ToolsforeverBundle\Repository\LocatieRepository")
 */
class Locatie
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
     * @ORM\Column(name="locatie", type="string", length=255)
     */
    private $locatie;


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
     * Set locatie
     *
     * @param string $locatie
     *
     * @return Locatie
     */
    public function setLocatie($locatie)
    {
        $this->locatie = $locatie;

        return $this;
    }

    /**
     * Get locatie
     *
     * @return string
     */
    public function getLocatie()
    {
        return $this->locatie;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLocatie();
    }
}
