<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TemperaturaController extends Controller
{
    /**
     * @Route("/convertir/{celsium}/", name="convertir")
     */
    public function convertirAction($celsium)
    {
        $K = $celsium + 273;
        $F = (9/5 * $celsium) + 32;
        return $this->render("Temperatura/convertir.html.twig", ["kelvin"=>$K, "fahrenheit"=>$F]);
    }
}
