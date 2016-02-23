<?php

namespace Moraspirit\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MoraspiritEventBundle:Default:list.html.twig', array('name' => $name));
    }
}
