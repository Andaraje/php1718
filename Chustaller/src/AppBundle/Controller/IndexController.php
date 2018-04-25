<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Articulos;
use AppBundle\Entity\Categoria;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="ultimos")
     */
    public function ultimosAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM articulos LIMIT 3 ";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
        return $this->render("default/index.html.twig", ["ultimos"=>$po]);
    }
    /**
     * @Route("/Buscar/{nombre}", name="busqueda")
     */
    public function busquedaAction(Request $request, $nombre)
    {
        //$var=$request->query->get("buscar");
        var_dump($nombre);
        // $lista=$this->getDoctrine()
        // ->getRepository("AppBundle\Entity\Articulos")->findBy(array('nombre'=> $nombre));
        // return $this->render(
        //     "cliente/busqueda.html.twig",
        // ["listado"=>$lista]);
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM articulos WHERE nombre LIKE '%$nombre%' ";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
        return $this->render("cliente/busqueda.html.twig", ["listado"=>$po]);
    }
}
