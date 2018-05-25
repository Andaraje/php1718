<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Hilo;

class ForoController extends Controller
{
    /**
     * @Route("/Foro/Home/", name="forohome")
     * 
     */
    public function forohomeAction(Request $request )
    {
        if($this->getUser()==null){
            return $this->render('foro/indexforo.html.twig');
        }else{
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni)); 
            //sacar todos los temas
            $em = $this->getDoctrine()->getManager();
            $hilos = $em->getRepository('AppBundle:Hilo')->findBy(array("identificador"=>0)); //identificador 0 quiere decir que es el titulo del hilo

            //crear el formulario para un nuevo Hilo
            $Hilo = new Hilo();
            $form = $this->createForm('AppBundle\Form\HiloType', $Hilo);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $Hilo->setClientecliente($usu);
                $Hilo->setIdentificador(0);
                $Hilo->setRespuestas(0);
                $Hilo->setFecha();
                $em->persist($Hilo);
                $em->flush();
    
                return $this->redirectToRoute('forohome');
            }     
            return $this->render('foro/indexforo.html.twig',
            ['user'=>$usu,
            'hilos'=>$hilos,
            'form' => $form->createView()
            ]);
        }
        
            
    }
    /**
     * @Route("/Foro/Hilo/{id}", name="hilo")
     * 
     */
    public function hiloAction(Request $request, $id )
    {
        if($this->getUser()==null){
            return $this->render('foro/indexforo.html.twig');
        }else{
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni)); 
            //sacar un tema en concreto
            $em = $this->getDoctrine()->getManager();
            $hilo = $em->getRepository('AppBundle:Hilo')->find($id);
            $respuestas = $em->getRepository('AppBundle:Hilo')->findBy(array('identificador'=> $id));
            //crear formulario para responder
            $nuevaR = new Hilo();
            $form = $this->createForm('AppBundle\Form\HiloType', $nuevaR);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) 
            {
                //Crear la nueva respuesta
                $nuevaR->setClientecliente($usu);
                $nuevaR->setIdentificador($id);
                $nuevaR->setRespuestas(0);
                $nuevaR->setFecha();
                $em->persist($nuevaR);
                //actualizar el hilo
                $hilo->setRespuestas($hilo->getRespuestas()+1);
                $em->persist($hilo);
                $em->flush();
                
            }     
            return $this->render('foro/hilo.html.twig',
            ['user'=>$usu,
             'hilo'=>$hilo,
            'respuestas'=>$respuestas,
            'form' => $form->createView()
            ]);
        }
        
            
    }
    /**
     * @Route("/Perfil/Hilos/", name="mispreguntas")
     * 
     */
    public function mispreguntasAction(Request $request )
    {
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni)); 
            //sacar todos los temas
            $em = $this->getDoctrine()->getManager();
            $hilos = $em->getRepository('AppBundle:Hilo')->findBy(array("clientecliente"=>$usu, "identificador"=>0)); //identificador 0 quiere decir que es el titulo del hilo
     
            return $this->render('cliente/mispreguntas.html.twig',
            ['user'=>$usu,
            'hilos'=>$hilos,
            ]);
            
    }
    /**
     * @Route("/Perfil/Respuestas/", name="misrespuestas")
     * 
     */
    public function misrespuestasAction(Request $request )
    {
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni)); 
            //sacar todos los temas
            $em = $this->getDoctrine()->getManager();
            $hilos = $em->getRepository('AppBundle:Hilo')->findBy(array("clientecliente"=>$usu)); //identificador 0 quiere decir que es el titulo del hilo
     
            return $this->render('cliente/misrespuestas.html.twig',
            ['user'=>$usu,
            'hilos'=>$hilos,
            ]);
            
    }
    /**
     * Deletes a hilo entity.
     *
     * @Route("Perfil/Foro/delete/{id}", name="hilos_delete")
     * 
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Hilo = $em->getRepository('AppBundle:Hilo')->find($id);
        $respuestas = $em->getRepository('AppBundle:Hilo')->findBy(array('identificador'=>$id));
        foreach ($respuestas as $key ) {
            $em->remove($key);
        }
        
        $em->remove($Hilo);
        $em->flush();


        return $this->redirectToRoute('perfil');
    }
    /**
     * Displays a form to edit an existing hilo entity.
     *
     * @Route("/Perfil/Foro/{id}/edit", name="hilo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Hilo $hilo)
    {
        $deleteForm = $this->createDeleteForm($hilo);
        $editForm = $this->createForm('AppBundle\Form\HiloType', $hilo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();   
            return $this->redirectToRoute('hilo_edit', array('id' => $hilo->getId()));
        }

        return $this->render('cliente/hiloedit.html.twig', array(
            'hilo' => $hilo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Creates a form to delete a Hilo entity.
     *
     * @param Hilo $hilo The hilo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hilo $hilo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hilos_delete', array('id' => $hilo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
