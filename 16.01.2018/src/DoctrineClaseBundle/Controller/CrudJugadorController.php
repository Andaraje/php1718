<?php

namespace DoctrineClaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DoctrineClaseBundle\Entity\Jugador;

class CrudJugadorController extends Controller
{
    /**
     * @Route("jugador/listado", name="listado_CrudJugador")
     *
     * @return void
     */
    public function ListadoAction()
    {
        $jugadores=$this->getDoctrine()
    ->getRepository("DoctrineClaseBundle\Entity\Jugador")
    ->findAll();
        return $this->render(
            "@DoctrineClase/CrudJugador/listado.html.twig",
        ["jugadoresvista"=>$jugadores]);
    }

    /**
     * @Route("jugador/nuevo", name="nuevo_crudjugador")
     *
     * @return void
     */
    public function NuevoAction()
    {
        $em=$this->getDoctrine()->getManager();
        $jugador=new Jugador();
        $jugador->setEmail("pepe@hot.es");
        $jugador->setPassword("2345");
        $em->persist($jugador);
        $em->flush();
        return $this->redirectToRoute("listado_CrudJugador");
    }
    /**
     * @Route("jugador/editar/{email}", name="editar_crudjugador")
     *
     * @return void
     */
    public function editarAction($email){
        $em=$this->getDoctrine()->getManager();
        $jugadores=$em->getRepository("DoctrineClaseBundle\Entity\Jugador");
        $jugador=$jugadores->find($email);
        $jugador->setPassword("Nueva clave ");
        $em->flush();
        return $this->redirectToRoute("listado_CrudJugador");
    }
    /**
     * @Route("jugador/borrar/{email}", name="borrar_crudjugador");
     *
     * @param [type] $email
     * @return void
     */
    public function borrarAction($email){
        $em=$this->getDoctrine()->getManager();
        $jugadores=$em->getRepository(Jugador::class);
        $jugador=$jugadores->find($email);
        $em->remove($jugador);
        $em->flush();
        return $this->redirectToRoute("listado_CrudJugador");
    }
    
    /**
     * @Route("jugador/anadirProducto/{email}/", name="anadirProducto_crudjugador");
     *
     * @param [type] $email
     * @return void
     */
    public function anadirProductoAction($email){
        $em=$this->getDoctrine()->getManager();
        $jugadores=$em->getRepository(Jugador::class);
        $jugador=$jugadores->find($email);
        $idProducto=1;
        $productos=$em->getRepository("DoctrineClaseBundle\Entity\Producto");
        $producto=$productos->find($idProducto);
        $jugador->addProductoproducto($producto);
        $em->flush();
        return $this->redirectToRoute("listado_CrudJugador");
    }
    
}
