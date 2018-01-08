<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class sessionController extends Controller
{
    /**
     * @route("/login/{user}/{password}", name="login_session")
     *
     * @return void
     */
    public function loginAction($user ,$password, Request $request)
    {
        //Cargar variables de sesion
        $sesion=$request->getSession();

       if($user=="admin" && $password=="1234")
       {
        $sesion->set("usuario",$user);
        return new Response("El login ha sida valido");
       }
    }
}
