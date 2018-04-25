<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class loginController extends Controller
{
    /**
     * @Route("/login", name="login_seguridad")
     *
     */
    public function loginAction(Request $request)
    {
        //Creo el formulario
        $formulario=$this->createFormBuilder()
        ->add("username",TextType::class)
        ->add("password",PasswordType::class)
        ->add("Login",SubmitType::class)
        ->getForm();

       $autenticacionUtils=$this->get('security.authentication_utils');
       $error=$autenticacionUtils->getLastAuthenticationError();
       return $this->render("Seguridad/login.html.twig",
    ["error"=>$error,"formulario"=>$formulario->createView()]);
    }

    /**
     * @Route("/login_check", name="login_check_seguridad")
     *
     * @return void
     */
    public function loginCheckAction()
    {

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }


    /**
     * @Route("/loginRedireccion", name="loginRedireccion")
     */
    public function loginRedireccion()
    {

        $usuario = get_current_user();

        if($this->isGranted('ROLE_CLIENTE')) {

            return $this->redirectToRoute('ultimos');
        }


        if($this->isGranted('ROLE_ADMIN')) {

            return $this->redirectToRoute('perfil');
        }

    }

}