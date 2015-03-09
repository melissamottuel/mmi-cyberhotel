<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class HotelExpress {
	
	/**
	 * The city where the hotel is located. 
	 *
	 * @var string
	 */
	protected $ville;

	/**
	 * The list of rooms in the hotel
	 * 
	 * @var \Doctrine\Common\Collections\Collection
	 */
	protected $chambres;

    /**
     * Constructor
     * 
     * @param string $ville
     */
    public function __construct($ville)
    {
    	$this->ville = $ville;
        $this->chambres = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille() {
        return $this->ville;
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
