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
     * @Route("/Carrito/Pagado/", name="pagar")
     * @Method({"POST"})
     */
    public function pagarAction(Request $request){
        if($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni));
            
            //datos recogidos por el ajax
            $data = json_decode($_POST['array']);
            
            if(empty($data)){
                $response = new JsonResponse();
                $response->setStatusCode(405);
                $response->setData(array(
                    'response' => 'error'
                ));
                return $response;
            }else{
                    //Crear una factura
                $factura = new Factura();
                $factura->setClientecliente($usu);
                $totalprecio = 0;
                $id = $factura->getIdfactura();
                
                foreach ($data as $producto) {
                    
                    $articulo = $this->getDoctrine()->getRepository('AppBundle\Entity\Articulos')->find($producto[0]);
                    $lineaf = new Detalle();
                    $lineaf->setArticulos($articulo);
                    $lineaf->setPrecio($articulo->getPrecio()*$producto[1]);
                    $totalprecio+=$articulo->getPrecio()*$producto[1];
                    $lineaf->setIdfactura($factura);
                    $lineaf->setCantidad($producto[1]);
                    $em->persist($lineaf);
                    $em->flush();
                }
                $factura->setPreciofac($totalprecio);
                $em->persist($factura);
                $em->flush();        
                
                $response = new JsonResponse();
                $response->setStatusCode(200);
                $response->setData(array(
                    'response' => 'success'
                ));
                return $response;
            }
            
        }
        
    }
    /**
     * @Route("/Perfil/MisFacturas/{id}", name="factura")
     */
    public function facturaAction(Request $request, $id){
        //El nombre del snappy
        $filename = 'myFirstSnappyPDF';
        $em = $this->getDoctrine()->getManager();
        $factura = $this->getDoctrine()->getRepository('AppBundle\Entity\Detalle')->findBy(array('idfactura'=>$id));
        //Renderizamos la vista pdf para pasarla a html
        $html = $this->renderView('cliente/factura.html.twig', array("factura"=>$factura));
        return new PdfResponse($this->get('knp_snappy.pdf')->getOutputFromHtml($html, array(
                'encoding' => 'utf-8', //Codificacion de caracteres para que no salgan simbolos extraños
            )
        ),
            'file.pdf' //Nombre del pdf
            
        );
    }
    /**
     * @Route("/Perfil/MisFacturas/", name="listadoF")
     */
    public function listadoFAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $dni=$this->getUser()->getUsername();// el email del usuario logeado
        $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni));
        $facturas = $this->getDoctrine()->getRepository('AppBundle\Entity\Factura')->findBy(array('clientecliente'=>$usu));
        return $this->render("cliente/facturacion.html.twig", ["facturas"=>$facturas]);
        
    }
}
