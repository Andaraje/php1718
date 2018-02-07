<?php

namespace DoctrineClaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
}
