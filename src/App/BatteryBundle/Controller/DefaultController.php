<?php

namespace App\BatteryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AppBatteryBundle:Default:index.html.twig', array('name' => $name));
    }
}
