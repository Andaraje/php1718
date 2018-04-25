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

class ArticuloController extends Controller
{
    /**
     * @Route("/Articulo/{id}", name="articulo")
     */
    public function categoriasAction(Request $request, $id){
        $Articulo=$this->getDoctrine()->getRepository("AppBundle\Entity\Articulos")->find($id);
        return $this->render("cliente/articulo.html.twig", ["articulo"=>$Articulo]);
    }
}
