<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    /**
     * @Route("/login/{user}/{password}", name="login_Session")
     * @return void
     */
    public function loginAction($user,$password,Request $request)
    {
        //Cargar variables de sesión
        $sesion=$request->getSession();
        if($user=="admin" && $password=="1234")
        {
            $sesion->set("usuario",$user);
            //return new Response(
            //    "El login ha sido válido para ".$user);
            $datos=["nombre"=>"Antonio","Edad"=>18];
            $diassemana=["Lunes","Martes","Miércoles"];
            return $this->render(
                "session/loginerror.html.twig",
                ["diassemana"=>$diassemana]);
        }
    }
}
