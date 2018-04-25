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

class CategoriasController extends Controller
{
    /**
     * @Route("Categorias/{cat}", name="categorias")
     */
    public function categoriasAction(Request $request, $cat){
        $lista=$this->getDoctrine()->getRepository("AppBundle\Entity\Articulos")->findBy(array('categoria'=> $cat));
        return $this->render("cliente/categorias.html.twig", ["articulos"=>$lista]);
    }
}
