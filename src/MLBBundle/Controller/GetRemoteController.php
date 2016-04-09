<?php

namespace MLBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use MLBBundle\Entity\MLBGameSchedule;


class GetRemoteController extends Controller
{   

    /**
     * @Route("/remote/{year}")
     * @param int $year
     */

    public function getRemoteAction($year)
        {

        if (!is_numeric($year))
            return new Response('Bad Request!', 400);

        $headers = array('Ocp-Apim-Subscription-Key' => 'a3c5572c24eb459eb7c627a1d4531d78',);
        
        $client  = new Client();
        
        $res = $client->get('https://api.fantasydata.net/mlb/v2/json/Games/'.$year,
            [
             'headers'         =>$headers,
             'timeout'         => 15
            ]);
                        
      
        $code = $res->getStatusCode();

         if ($code != '200')
            return new Response('Bad Request!', 400);

        $response = $res->getBody();
        
       
         $dataMLB = json_decode($response,true);

         if(!$dataMLB)
            return new Response('Bad Request!', 400);

         $i = 0;

     foreach ($dataMLB as $v) {
                     
            $mlb = new MLBGameSchedule();

                $mlb ->setday(new \DateTime($dataMLB[$i]['Day']));
                $mlb ->sethomeTeam($dataMLB[$i]['HomeTeam']);
                $mlb ->setawayTeam($dataMLB[$i]['AwayTeam']);
                $mlb ->setstadiumID($dataMLB[$i]['StadiumID']);
                $mlb ->setyear($year);

                $i++;

             
            $em = $this->getDoctrine()->getManager();

            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($mlb);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();

        }    

            return new Response('Saved schedule games '.$year);
        
        
    }

}
