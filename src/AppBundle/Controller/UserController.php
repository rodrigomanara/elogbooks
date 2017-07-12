<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of UserController
 *
 * @author Rodrigo
 */
class UserController extends AbstractApiController {
    //put your code here

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("")
     * @Method("POST")
     */
    public function LoginAction(Request $request) {
        
    }
    /**
     * 
     * @param Request $request
     */
    public function UserUtilsAction(Request $request) {
        
    }
    
    public function registerAction(Request $request) {
        
    }

}
