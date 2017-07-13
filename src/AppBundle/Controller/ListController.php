<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ListController extends Controller {
    //put your code here

    /**
     * @Route("/", name="welcome")
     */
    public function showAction(Request $request) {
       

        return $this->render('default/index.html.twig', array('character' => []));
    }

}
