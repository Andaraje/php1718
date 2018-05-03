<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class adminController extends Controller
{
    /**
     * @Route("/Admin", name="administrador")
     */
    public function administradorAction(){
        
            return $this->render("admin/baseadmin.html.twig");
    }
}
