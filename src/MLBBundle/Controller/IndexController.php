<?php

namespace MLBBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()

    {
    
    	

        return $this->render('index.html.twig', array(
            // ...
        ));
    }

}
