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
        return $this->render('default/index.html.twig', array('page_title' => ' '));
    }

    /**
     * @Route("/member/joblist", name="joblist")
     */
    public function showJobsList() {
        return $this->render('default/job.list.html.twig', array('page_title' => 'Jobs List Manager '));
    }
     /**
     * @Route("/member/quotelist", name="quotelist")
     */
    public function showQuoteList() {
        return $this->render('default/quote.list.html.twig', array('page_title' => 'Quote List Manager '));
    }
    /**
     * @Route("/member/userlist", name="userlist")
     */
    public function showUserList() {
        return $this->render('default/user.list.html.twig', array('page_title' => 'User List Manager '));
    }
    

}
