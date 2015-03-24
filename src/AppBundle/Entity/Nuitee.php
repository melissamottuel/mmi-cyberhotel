<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 *
 * @author mbangum
 *
 */
class Nuitee {
	/**
     * @ORM\ManyToOne(targetEntity="Chambre", inversedBy="dans")
     * @ORM\JoinColumn(name="numeroChambre", referencedColumnName="hotel")
     * @ORM\Id
     * 
     */
	protected $pendant;
	
	/**
	 *  @ORM\Column(type="date")
	 * @var Date
	 */
	protected $date;
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Sejour", inversedBy="nuitee")
	 * @ORM\JoinColumn(name="nuitee", referencedColumnName="dateDeDebut")
	 * 
	 */
	protected $sejour;

}