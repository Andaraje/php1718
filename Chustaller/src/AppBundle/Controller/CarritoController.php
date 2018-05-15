<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CarritoController extends Controller
{
    /**
     * @Route("/Carrito/", name="carrito")
     */
    public function carritoAction(Request $request)
    {
        if($this->getUser()==null){
            return $this->render("cliente/carrito.html.twig");
        }else{
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni));
            return $this->render("cliente/carrito.html.twig", ['user'=>$usu]);
        }
    }
}
