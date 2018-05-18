<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Articulos;
use AppBundle\Entity\Categoria;
use AppBundle\Entity\Cliente;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
        return $this->render('cliente/perfil.html.twig',['user'=>$cliente,'cliente'=>$usu]);
    }
    /**
     * Displays a form to edit an existing cliente entity.
     *
     * @Route("/Perfil/{idcliente}/edit", name="perfilcliente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cliente $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);
        $editForm = $this->createForm('AppBundle\Form\ClienteType', $cliente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            return $this->redirectToRoute('perfilcliente_edit', array('idcliente' => $cliente->getIdcliente()));
        }

        return $this->render('cliente/perfiledit.html.twig', array(
            'cliente' => $cliente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Creates a form to delete a cliente entity.
     *
     * @param Cliente $cliente The cliente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cliente $cliente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cliente_delete', array('idcliente' => $cliente->getIdcliente())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
