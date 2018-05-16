<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Cliente;
use AppBundle\Entity\Factura;
use AppBundle\Entity\Detalle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Knp\Bundle\SnappyBundle\KnpSnappyBundle;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

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
            $factura = new Factura();
            $lineaf = new Detalle();
            $lineaf->setClientecliente($usu);
            $lineaf->setArticulos($articulo);

            //calcular el precio total
            $precio = $articulo->getPrecio();
            

            $lineaf->setCantidad($cant);
            $em->persist($lineaf);
            $em->flush();

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success'
            ));
            return $response;
        }
        
    }
    /**
     * @Route("/Carrito/Pagado/Factura/", name="factura")
     */
    public function facturaAction(Request $request){
        //El nombre del snappy
        $filename = 'myFirstSnappyPDF';
            
        //Renderizamos la vista pdf para pasarla a html
        $html = $this->renderView('cliente/factura.html.twig');
        return new PdfResponse($this->get('knp_snappy.pdf')->getOutputFromHtml($html, array(
                'encoding' => 'utf-8', //Codificacion de caracteres para que no salgan simbolos extraños
            )
        ),
            'file.pdf' //Nombre del pdf
            
        );
    }
}
