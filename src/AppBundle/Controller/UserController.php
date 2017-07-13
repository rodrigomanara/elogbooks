<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Form\FilterType\Model\ListFilter;
use Knp\Component\Pager\Pagination\AbstractPagination; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/member/user")
 */
class UserController extends AbstractApiController{
     

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("")
     * @Method("GET")
     */
    public function cgetAction(Request $request)
    {
         

        $filter = new ListFilter();
        $form = $this->createForm('AppBundle\Form\FilterType\ListFilterType', $filter, ['method' => 'GET']);
        $form->handleRequest($request);

        if ($this->getErrors($form)) {
            return $this->returnViewResponse($this->getErrors($form), Response::HTTP_BAD_REQUEST, $filter->getSerialisationGroups());
        }
         
        /** @var AbstractPagination $pagination */
        $pagination = $this->get('knp_paginator')->paginate(
            $this->getDoctrine()->getRepository(\AppBundle\Entity\User::class)->findAll(),
            $filter->getPage(),
            $filter->getLimit()
        );
        
 
        return $this->returnCollectionViewResponse(
            $pagination,
            Response::HTTP_OK,
            $filter->getSerialisationGroups()
        );
          
    }

}
