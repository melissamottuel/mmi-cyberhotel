<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 *@ORM\Entity
 *
 * @author mbangum
 *
 */
class Sejour {

	
	/**
	 * @ORM\OneToMany(targetEntity="Nuitee", mappedBy="date")
	 * @ORM\Column(type="date")
	 * @ORM\Id
	 * @var Date
	 */
	protected $dateDeDebut;
	
	
	/**
	 * 
	 * @ORM\Column(type="integer")
	 * @var integer
	 */
	protected $nbDeJours;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Reservation", inversedBy="sejour")
	 * @ORM\JoinColumn(name="sejourReserve", referencedColumnName="id")
	 */
	protected $sejourReserve;
	
	/**
	 * 
	 *  @ORM\ManyToOne(targetEntity="HotelExpress", inversedBy="sejourDans")
	 *  @ORM\JoinColumn(name="DansHotel", referencedColumnName="ville")
	 * 
	 */
	protected $dansHotel;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Nuitee", mappedBy="sejour")
	 * @ORM\Column(type="integer")
	 * 
	 */
	protected $nuitee;
	
	

}