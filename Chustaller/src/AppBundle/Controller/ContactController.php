<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ContactType;

class ContactController extends Controller
{
    /**
     * 
     * @Route("/Contacto/", name="contact")
     * @param Request $query
     */
    public function contactAction(Request $query)
    {
        $form = new ContactType();
        $form = $this->createForm('AppBundle\Form\ContactType');

        if ($query->isMethod('POST')) {
            $form->handleRequest($query);

            if ($form->isValid()) {
                $nombre = $form->getData()['nombre'];
                $email = $form->getData()['email'];
                $motivo = $form->getData()['motivo'];
                $mensaje = $form->getData()['mensaje'];
                $ip = $query->getClientIp();
                $cuerpo = "Nombre :". $nombre . "\n"."Email :".$email . "\n" . $mensaje . "\n" . $ip;
                mail("chustallerr@gmail.com,chustallerr@gmail.com",$motivo,$cuerpo) ;

                $query->getSession()->getFlashBag()->add('success', 'Tu email ha sido enviado. Gracias');

                return $this->redirect($this->generateUrl('contact'));
            }
        }
        if($this->getUser()==null){
            return $this->render('cliente/contacto.html.twig', ["form"=> $form->createView()]);
        }else{
            $dni=$this->getUser()->getUsername();// el id del usuario logeado
            $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente')->findOneBy(array('email' => $dni));
            return $this->render('cliente/contacto.html.twig', ["form"=> $form->createView(), 'user'=>$usu]);
        }
        
    }
}
