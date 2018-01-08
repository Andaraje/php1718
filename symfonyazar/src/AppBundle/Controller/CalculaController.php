<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CalculaController extends Controller
{
    /**
     * @Route("/suma/{op1}/{op2}",name="calcula_suma")
     */
    public function sumaAction($op1, $op2){
        $suma =  $op1+$op2;
        return new Response("<strong>Estoy sumando $op1 + $op2 = $suma </strong>");
    }

    /**
     * @Route("/multiplica/{fact1}/{fact2}", name="calcula_multiplica")
     */
    public function multiplicaAction($fact1, $fact2, Request $request){
        //variables de sesion
        $sesion=$request->getSession();
        $usuario=$sesion->get("usuario", "Los Manueles");
        if($usuario=="Los Manueles")
        {
            $sesion->set("usuario","La clase 2DAA");
        }

        //leer mediante get
        $operacion=$request->get("operacion");
        $multiplicacion =  $fact1*$fact2;
        return $this->render("calcula/multiplica.html.twig", ["factor1"=> $fact1, "factor2"=>$fact2, "resultado"=>$multiplicacion,
        "operacion"=>$operacion, "usuario"=>$usuario]);
    }
}
