<?php

namespace DoctrineClaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/doctrine")
     */
    public function indexAction()
    {
        return $this->render('@DoctrineClase/Default/index.html.twig');
    }
}
