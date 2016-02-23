<?php

namespace Bundle\VacancyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BundleVacancyBundle:Default:index.html.twig', array('name' => $name));
    }
}
