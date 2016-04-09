<?php

namespace MLBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;



class TableController extends Controller
{
    /**
     * @Route("/table/{year}")
     * @param int $year
     */
    public function tableAction($year)
    {
        if (!is_numeric($year))
            return new Response('Bad Request!', 400);
    
        $client = new Client();
        
        $res= $client->get('http://schedule.kolja153.com/api/'.$year,[
            'timeout'=> 15,
            'debug' => false,
            'exceptions' => false
         ]);        
        
        $code = $res->getStatusCode();   
        
        $mlbData = $res->getBody();

        $mLBGameSchedules = json_decode($mlbData,true);
        
        if (empty($mLBGameSchedules))
             return new Response('No data in the database for '.$year, 400);  

        return $this->render('default/Shedule.html.twig', array(
            'mLBGameSchedules' => $mLBGameSchedules,
            'year' => $year,
        ));
    }    
}
