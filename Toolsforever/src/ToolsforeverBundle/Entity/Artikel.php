<?php

namespace ToolsforeverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="ToolsforeverBundle\Repository\ArtikelRepository")
 */
class Artikel
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
     * @ORM\Column(name="Productnaam", type="string", length=255)
     */
    private $productnaam;

    /**
     * @var string
     *
     * @ORM\Column(name="Omschrijving", type="text")
     */
    private $omschrijving;

    /**
     * @var float
     *
     * @ORM\Column(name="Prijs", type="float")
     */
    private $prijs;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="Klantid", type="integer")
     */
    private $klantid;

    /**
     * @var int
     *
     * @ORM\Column(name="Locatieid", type="integer")
     */
    private $locatieid;

    /**
     * @var int
     *
     * @ORM\Column(name="Fabriekid", type="integer")
     */
    private $fabriekid;

    /**
     * @ORM\ManyToOne(targetEntity="ToolsforeverBundle\Entity\Klant")
     * @ORM\JoinColumn(name="Klantid", referencedColumnName="id")
     */
    private $klant;

    /**
     * @ORM\ManyToOne(targetEntity="ToolsforeverBundle\Entity\Locatie")
     * @ORM\JoinColumn(name="Locatieid", referencedColumnName="id")
     */
    private $locatie;

    /**
     * @ORM\ManyToOne(targetEntity="ToolsforeverBundle\Entity\Fabriek")
     * @ORM\JoinColumn(name="Fabriekid", referencedColumnName="id")
     */
    private $fabriek;
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the file as pdf,png,jpeg,jpg.gif.")
     * @Assert\File(mimeTypes={
     *          "image/png",
     *          "image/jpeg",
     *          "image/jpg",
     *          "image/gif",
     *          "application/pdf",
     *          "application/x-pdf",
     *          "application/docx"
     *     })
     */
    private $brochure;

    public function getBrochure()
    {
        return $this->brochure;
    }

    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }

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
     * Set productnaam
     *
     * @param string $productnaam
     *
     * @return Artikel
     */
    public function setProductnaam($productnaam)
    {
        $this->productnaam = $productnaam;

        return $this;
    }

    /**
     * Get productnaam
     *
     * @return string
     */
    public function getProductnaam()
    {
        return $this->productnaam;
    }

    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Artikel
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set prijs
     *
     * @param float $prijs
     *
     * @return Artikel
     */
    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;

        return $this;
    }

    /**
     * Get prijs
     *
     * @return float
     */
    public function getPrijs()
    {
        return $this->prijs;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Artikel
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set klantid
     *
     * @param integer $klantid
     *
     * @return Artikel
     */
    public function setKlantid($klantid)
    {
        $this->klantid = $klantid;

        return $this;
    }

    /**
     * Get klantid
     *
     * @return int
     */
    public function getKlantid()
    {
        return $this->klantid;
    }

    /**
     * Set locatieid
     *
     * @param integer $locatieid
     *
     * @return Artikel
     */
    public function setLocatieid($locatieid)
    {
        $this->locatieid = $locatieid;

        return $this;
    }

    /**
     * Get locatieid
     *
     * @return int
     */
    public function getLocatieid()
    {
        return $this->locatieid;
    }

    /**
     * Set fabriekid
     *
     * @param integer $fabriekid
     *
     * @return Artikel
     */
    public function setFabriekid($fabriekid)
    {
        $this->fabriekid = $fabriekid;

        return $this;
    }

    /**
     * Get fabriekid
     *
     * @return int
     */
    public function getFabriekid()
    {
        return $this->fabriekid;
    }

    /**
     * Set klant
     *
     * @param \ToolsforeverBundle\Entity\Klant $klant
     *
     * @return Artikel
     */
    public function setKlant(\ToolsforeverBundle\Entity\Klant $klant = null)
    {
        $this->klant = $klant;

        return $this;
    }

    /**
     * Get klant
     *
     * @return \ToolsforeverBundle\Entity\Klant
     */
    public function getKlant()
    {
        return $this->klant;
    }

    /**
     * Set locatie
     *
     * @param \ToolsforeverBundle\Entity\Locatie $locatie
     *
     * @return Artikel
     */
    public function setLocatie(\ToolsforeverBundle\Entity\Locatie $locatie = null)
    {
        $this->locatie = $locatie;

        return $this;
    }

    /**
     * Get locatie
     *
     * @return \ToolsforeverBundle\Entity\Locatie
     */
    public function getLocatie()
    {
        return $this->locatie;
    }

    /**
     * Set fabriek
     *
     * @param \ToolsforeverBundle\Entity\Fabriek $fabriek
     *
     * @return Artikel
     */
    public function setFabriek(\ToolsforeverBundle\Entity\Fabriek $fabriek = null)
    {
        $this->fabriek = $fabriek;

        return $this;
    }

    /**
     * Get fabriek
     *
     * @return \ToolsforeverBundle\Entity\Fabriek
     */
    public function getFabriek()
    {
        return $this->fabriek;
    }
}
