<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * @ORM\Entity
 * 
 * @author mbangum
 *
 */
class HotelExpress {
	
	/**
	 * 
	 * @ORM\OneToMany(targetEntity="Sejour", mappedBy="dansHotel")
	 * 
	 * @var \Doctrine\Common\Collections\Collection
	 */
	protected $sejourDans;
	
	
	/**
	 * The city where the hotel is located. 
	 *
     * @ORM\Column(type="string", length=100)
     * @ORM\Id
     * 
	 * @var string
	 */
	protected $ville;
	
	
	/**
	 * The country where the hotel is located.
	 *
	 * @ORM\Column(type="string", length=100, nullable=true)
	 *
	 * @var string
	 */
	protected $pays;

	/**
	 * The list of rooms in the hotel
	 * 
	 * @ORM\OneToMany(targetEntity="Chambre", mappedBy="hotel")
	 * 
	 * @var \Doctrine\Common\Collections\Collection
	 */
	protected $chambres;
	
	
	/**
	 * The description of the hotel
	 *
	 * @ORM\Column(type="string", length=100, nullable=true)
	 *
	 * @var string
	 */
	protected $description;
	
	/**
	 * The price of the chamber
	 *
	 * @ORM\Column(type="integer", nullable=true)
	 *
	 * @var string
	 */
	protected $prix;

    /**
     * Constructor
     * 
     * @param string $ville
     */
    public function __construct($ville)
    {
    	$this->ville = $ville;
        $this->chambres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sejourDans = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * The adress of the hotel
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     *
     * @var string
     */
    protected $adresse;
	
    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille() {
        return $this->ville;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays() {
    	return $this->pays;
    }
    

    /**
     * Get chambres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChambres() {
        return $this->chambres;
    }
    
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
    	return $this->description;
    }
    
    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix() {
    	return $this->prix;
    }
    

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse() {
    	return $this->adresse;
    }
     
    
    /**
     * Add chambres
     *
     * @param \AppBundle\Entity\Chambre $chambres
     * @return HotelExpress
     */
    public function addChambre(\AppBundle\Entity\Chambre $chambre) {
    	
    	/*
    	 * Verify this hotel was the one used to create the room object
    	 */
    	if ($chambre->getHotel() !== $this) {
    		throw new AccessDeniedHttpException("Trying to add room to another hotel");
    	}
    	
        $this->chambres[] = $chambre;
        return $this;
    }

}
