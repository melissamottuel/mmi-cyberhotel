<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\HotelExpress;
use AppBundle\Entity\Chambre;

class HotelController extends Controller {
    
    /**
     * @Route("/hotel/", name="hotel.list")
     */
    public function hotels() {
		return $this->render('AppBundle:hotel:list.html.twig', array('hotels' => $this->getHotels()));

    }

       /**
     * @Route("/hotel/{ville}", name="hotel.detail")
     */
    public function hotel($ville) {
		return $this->render('AppBundle:hotel:detail.html.twig', array('hotel' =>$this->getHotel($ville)));
    }
	
    /**
     * @Route("/hotel/add/{ville}", name="hotel.add")
     */
    public function addHotel($ville) {
		$hotel = new HotelExpress($ville);
		$this->persist($hotel);
        
		return $this->render('default/message.html.twig', array(
			'message' => "Added hotel !".$hotel->getVille()
		));
		
    }

    /**
     * @Route("/hotel/add/{ville}/{numero}", name="hotel.add.room")
     */
    public function addRoom($ville,$numero) {

    	$hotel = $this->getHotel($ville);

    	if (!$hotel) {
			throw $this->createNotFoundException('No hotel found for city '.$ville);
		}    	
    	
		$room = new Chambre($hotel,$numero);
		$this->persist($room);
        
		return $this->render('default/message.html.twig', array(
			'message' => "Added hotel rooom :".$hotel->getVille()."<->".$room->getNumero()
		));
		
    }
     
    
    /**
     * Get the list of all the hotels.
     * 
     * @return \Doctrine\Common\Collections\Collection 
     */
    private function getHotels() {
    	
 		
    	$hotels = $this->getDoctrine()->getRepository('AppBundle:HotelExpress')->findAll();
		return $hotels;
    }
    
    /**
     * Get a hotel object givent its city
     * 
     * @param string $ville
     * @return \AppBundle\Entity\HotelExpress 
     */
    private function getHotel($ville) {

   		 $em 	= $this->getDoctrine()->getManager();
    	 $hotel = $em->getRepository('AppBundle:HotelExpress')->findOneByVille($ville);
    	
		return $hotel;
    }
    
    /**
     * Adds an object to the managed persistent entities
     * 
     * @param unknown_type $entity
     */
    private function persist($entity) {
    	
    	$em = $this->getDoctrine()->getManager();
    	$em-> persist($entity);
    	$em->flush();
    	 
    }
    
}
