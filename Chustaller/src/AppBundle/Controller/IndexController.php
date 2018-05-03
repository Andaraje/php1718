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

        //contador de visitas
        $ip = $this->container->get('request_stack')->getCurrentRequest()->getClientIp();
        $fecha = date("d/m/y");
        $query2 = "SELECT * from contador where fecha LIKE '$fecha' AND ip LIKE '$ip' ";
        $stmt2 = $db->prepare($query2);
        $params2 = array();
        $stmt2->execute($params2);
        $po2=$stmt2->fetchAll();
        if(count($po2)>0)   
        {//no se cuenta la visita   
        }   
        else   
        {    
            $query3 = "INSERT INTO contador (id, ip, fecha) VALUES ('1','$ip','$fecha')";
            $stmt3 = $db->prepare($query3);
            $params3 = array();
            $stmt3->execute($params3);  
            //$stmt3->flush();
        }   
        //contador de visitas



        
 
        $query = "SELECT * FROM articulos LIMIT 3 ";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();

        if($this->getUser()==null){
            return $this->render("default/index.html.twig", ["ultimos"=>$po]);
        }else{
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni));
            return $this->render("default/index.html.twig", ["ultimos"=>$po, 'user'=>$usu]);
        }
        
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
