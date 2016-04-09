<?php

namespace MLBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use MLBBundle\Entity\MLBGameSchedule;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ApiController extends Controller
{
    /**
     * @Route("/api/{year}")
     * @Method("GET")
     * @param int $year
     */

    public function apiAction($year)
    {
        if (!is_numeric($year))
            return new Response('Bad Request!', 400);

        $repository = $this->getDoctrine()
            ->getRepository('MLBBundle:MLBGameSchedule');

            $query = $repository->createQueryBuilder('p')
                ->where('p.year = :year')
                ->setParameter('year', $year)
                ->getQuery();

              $mlb = $query->getArrayResult();

        if (empty($mlb))
            return new Response('No data in the database for '.$year, 400);     

        $mlb=json_encode($mlb,true);                                  

      return new Response($mlb,200);
            
    }

}
