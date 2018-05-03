<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use AppBundle\Entity\User;
use AppBundle\Entity\Cliente;
use AppBundle\Entity\Poblacion;

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
        //hasta aqui la parte de iniciar sesión, ahora la parte del registro
        
        //Recojo todas las provincias para pasarlas a un select y poder filtrar mediantes ajax
        //las poblaciones de estas.
        $provincias=$this->getDoctrine()->getRepository("AppBundle\Entity\Provincia")->findAll();

        //Formulario del nuevo usuario
        $em=$this->getDoctrine()->getManager();
        $rol= $em->getRepository("AppBundle\Entity\Rol")->findOneBy(['id'=> 2]);  //Rol del cliente
        $Cliente = new Cliente();
        $formulario2=$this->createForm('AppBundle\Form\ClienteType', $Cliente);//Crear formulario
        $formulario2->handleRequest($request);
        //Validar formulario
        if($formulario2->isSubmitted() && $formulario2->isValid())
        {
            $user = new User();
            $prueba = $formulario2->getData()->getDni();
            $email = $formulario2->getData()->getEmail();
            $user->setUsername($email);
            $user->setEmail($email);
            $user->setPassword(password_hash($prueba, PASSWORD_BCRYPT));
            $user->addRol( $rol);

            $em->persist($user);
            $Cliente->setUser($user);
            $em->persist($Cliente);
            $em->flush();
            return $this->redirectToRoute('perfil');
        }

       return $this->render("Seguridad/login.html.twig",
    ["formulario2"=>$formulario2->createView(),"error"=>$error,"formulario"=>$formulario->createView(), "provincias"=>$provincias]);
    }
     /**
     * @Route("/login/{cod}", name="poblacion")
     * @Method({"GET"})
     * 
     */
    public function poblacionAction(Request $request, $cod)
    {
        if($request->isXmlHttpRequest())
        {
            $encoders = array(new JsonEncoder(),new XmlEncoder());
            $normalizers = array(new ObjectNormalizer());

            $serializer = new Serializer($normalizers, $encoders);

            $em = $this->getDoctrine()->getManager();
            $posts =  $em->getRepository('AppBundle\Entity\Poblacion')->findBy(array('provinciaprovincia'=> $cod));
            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'posts' => $serializer->serialize($posts, 'json')
            ));
            return $response;
        }
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
        return $this->redirectToRoute('ultimos');
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

            return $this->redirectToRoute('administrador');
        }

    }

}