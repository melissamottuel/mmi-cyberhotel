<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 *
 * @author mbangum
 *
 */
class CompteClient {
	
	/**
	 * 
	 * @ORM\Column(type="integer")
	 * @var integer
	 * 
	 */
	protected $numeroCarteBleue;
	
	
	/**
	 *
	 * @ORM\Column(type="string")
	 * @var String
	 */
	protected $nom;
	
	/**
	 *
	 * @ORM\Column(type="integer")
     * @ORM\Id
	 * @var integer
	 */
	protected $numero;
	
	/**
	 *
	 * @ORM\Column(type="string")
	 * @var String
	 */
	protected $mel;
	
	/**
	 * 
 	 * @ORM\OneToMany(targetEntity="Reservation", mappedBy="client")
 	 * @ORM\Column(type="string")
	 */
	protected $reservations;

}