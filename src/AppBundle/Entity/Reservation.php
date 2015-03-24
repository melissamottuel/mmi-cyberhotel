<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 *
 * @author mbangum
 *
 */
class Reservation {
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 *
	 */
	protected $id;
	
	/**
	 * 
	 * @ORM\Column(type="date")
	 * @var Date
	 */
	protected $date;
	
	/**
	 * @ORM\ManyToOne(targetEntity="CompteClient", inversedBy="reservation")
	 * @ORM\JoinColumn(name="reservation", referencedColumnName="numero")
	 */
	protected $client;
	
	/**
	 * 
	 * @ORM\OneToMany(targetEntity="Sejour", mappedBy="sejourReserve")
	 * @ORM\Column(type="date")
	 */
	protected $sejour;
	
	
	}