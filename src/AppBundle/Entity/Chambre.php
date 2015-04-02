<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * 
 * @author mbangum
 *
 */
class Chambre {

	/**
	 * A reference to the hotel containing this room.
	 * 
     * @ORM\ManyToOne(targetEntity="HotelExpress", inversedBy="chambres")
     * @ORM\JoinColumn(name="hotel", referencedColumnName="ville")
	 * @ORM\Id
	 * 
	 * @var \AppBundle\Entity\HotelExpress
	 */
	protected $hotel;
	
	/**
	 * 
	 * @ORM\OneToMany(targetEntity="Nuitee", mappedBy="pendant")
     * 
	 * @var \Doctrine\Common\Collections\Collection
	 */
	protected $dans;
	
	/**
	 * 
	 * The room number
	 * @ORM\Column(type="integer")
     * @ORM\Id
     * 
	 * @var integer
	 */
	protected $numero;
	
	
	
	
    /**
     * Constructor
     * 
     * @param \AppBundle\Entity\HotelExpress $hotel
     * @param integer $numero
     */
    public function __construct(\AppBundle\Entity\HotelExpress $hotel, $numero) {
    	$this->hotel = $hotel;
        $this->numero = $numero;
        $this->hotel->addChambre($this);
        
        $this->dans = new \Doctrine\Common\Collections\ArrayCollection();
        
        
    }
	
    /**
     * Get hotel
     *
     * @return \AppBundle\Entity\HotelExpress 
     */
    public function getHotel() {
        return $this->hotel;
    }
    
    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero() {
        return $this->numero;
    }

}
