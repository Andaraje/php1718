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

class PerfilController extends Controller
{
    /**
     * @Route("/Perfil/", name="perfil")
     */
    public function perfilAction(Request $request){
        $dni=$this->getUser()->getId();// el id del usuario logeado

        $usu = $this->getDoctrine()->getRepository('AppBundle\Entity\User')->find($dni);


        $alum = $this->getDoctrine()->getRepository('AppBundle\Entity\Cliente');
        $qb = $alum->createQueryBuilder('p')
        ->where('p.user= :user_id')
        ->setParameter('user_id',$dni)
        ->getQuery();
        $cliente= $qb->getSingleResult();
        return $this->render('cliente/perfil.html.twig',['usuario'=>$cliente,'user'=>$usu]);
    }
}
