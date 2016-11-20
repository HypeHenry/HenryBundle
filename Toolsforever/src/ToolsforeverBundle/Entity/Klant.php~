<?php

namespace ToolsforeverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Klant
 *
 * @ORM\Table(name="klant")
 * @ORM\Entity(repositoryClass="ToolsforeverBundle\Repository\KlantRepository")
 */
class Klant
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
     * @ORM\Column(name="Naam", type="string", length=255)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="Adres", type="string", length=255)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="Postcode", type="string", length=255)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="Plaats", type="string", length=255)
     */
    private $plaats;


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
     * Set naam
     *
     * @param string $naam
     *
     * @return Klant
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return Klant
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Klant
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set plaats
     *
     * @param string $plaats
     *
     * @return Klant
     */
    public function setPlaats($plaats)
    {
        $this->plaats = $plaats;

        return $this;
    }

    /**
     * Get plaats
     *
     * @return string
     */
    public function getPlaats()
    {
        return $this->plaats;
    }

    public function __toString(){
        return $this->getNaam();
    }
}
