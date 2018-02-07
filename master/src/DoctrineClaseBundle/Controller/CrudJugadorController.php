<?php

namespace DoctrineClaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DoctrineClaseBundle\Entity\Jugador;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

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
    public function NuevoAction(Request $peticion)
    {
        //Vamos a crear un formulario
        $jugador=new Jugador();
        $formulario=$this->createFormBuilder($jugador)
        ->add("email",TextType::class)
        ->add("password",PasswordType::class)
        ->add("Grabar",SubmitType::class)
        ->getForm();

        //Rercojo la petición del formulario
        $formulario->handleRequest($peticion);
        //Hemos pulsado grabar(post) y datos válidos
        if($formulario->isSubmitted() && 
        $formulario->isValid())
        {
            $jugador=$formulario->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($jugador);
            $em->flush();
            return $this->redirectToRoute("listado_CrudJugador");
        }

        //LLamada a la vista
        return $this->render(
            "@DoctrineClase/CrudJugador/nuevo.html.twig",
            ["formulario"=>$formulario->createView()]);

        
    }
     
    /**
     * @Route("jugador/editar/{email}", name="editar_crudjugador")
     *
     * @param [type] $email
     * @return void
     */
    public function editarAction($email,Request $peticion)
    {
        $em=$this->getDoctrine()->getManager();
        $jugadores=$em->getRepository(
        "DoctrineClaseBundle\Entity\Jugador");
        $jugador=$jugadores->find($email);
        
        $formulario=$this->createForm('DoctrineClaseBundle\Form\JugadorType',$jugador);

        $formulario->handleRequest($peticion);
        if($formulario->isSubmitted() && $formulario->isValid())
        {
            if($formulario->get("Grabar")->isClicked())
            {
                $em->flush();
            }
            
            return $this->redirectToRoute("listado_CrudJugador");
        }

        return $this->render("@DoctrineClase/CrudJugador/nuevo.html.twig",
        ["formulario"=>$formulario->createView()]);
    }

    /**
     * @Route("jugador/borrar/{email}", name="borrar_crudjugador")
     */
    public function borrarAction($email)
    {
        $em=$this->getDoctrine()->getManager();
        $jugadores=$em->getRepository(Jugador::class);
        $jugador=$jugadores->find($email);
        $em->remove($jugador);
        $em->flush();
        return $this->redirectToRoute("listado_CrudJugador");
    }
}
