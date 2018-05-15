<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Cliente;
use AppBundle\Entity\Factura;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class FacturaController extends Controller
{
    /**
     * @Route("/Carrito/Pagado/{id}/{cant}", name="pagar")
     * @Method({"GET"})
     */
    public function pagarAction(Request $request, $id, $cant){
        if($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni));
            $articulo = $this->getDoctrine()->getRepository('AppBundle\Entity\Articulos')->find($id);
            $lineaf = new Factura();
            $lineaf->setClientecliente($usu);
            $lineaf->setArticulos($articulo);

            //calcular el precio total
            $precio = $articulo->getPrecio();
            $total = $precio * $cant;

            $lineaf->setPreciofac($total);
            $em->persist($lineaf);
            $em->flush();

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'posts' => $lineaf
            ));
            return $response;
        }
        
    }
}
