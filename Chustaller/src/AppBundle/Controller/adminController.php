<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class adminController extends Controller
{
    /**
     * @Route("/Admin", name="administrador")
     */
    public function administradorAction(){

        //Total de compras de un mes dado
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();
        $query = "SELECT fecha, sum(preciofac) as total, count(*) as num FROM factura GROUP BY month(fecha) ORDER BY fecha;  ";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();

        
        //facturas
        $facturas = $em->getRepository('AppBundle:Factura')->findAll();
            return $this->render("admin/indexadmin.html.twig", ['compras'=>$po, 'facturas'=>$facturas]);
    }
}
