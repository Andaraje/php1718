<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cliente controller.
 *
 * @Route("")
 */
class ClienteController extends Controller
{
    /**
     * Lists all cliente entities.
     *
     * @Route("/Admin/Clientes/", name="cliente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clientes = $em->getRepository('AppBundle:Cliente')->findAll();

        return $this->render('admin/clientes.html.twig', array(
            'clientes' => $clientes,
        ));
    }

    

    /**
     * Displays a form to edit an existing cliente entity.
     *
     * @Route("/Admin/Clientes/{idcliente}/edit", name="cliente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cliente $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);
        $editForm = $this->createForm('AppBundle\Form\ClienteType', $cliente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();   
            return $this->redirectToRoute('cliente_edit', array('idcliente' => $cliente->getIdcliente()));
        }

        return $this->render('Admin/clienteedit.html.twig', array(
            'cliente' => $cliente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cliente entity.
     *
     * @Route("/Admin/Clientes/{idcliente}", name="cliente_delete")
     * 
     */
    public function deleteAction(Request $request,$idcliente)
    {
        $em=$this->getDoctrine()->getManager();
        $clientes=$em->getRepository(Cliente::class);
        $c=$clientes->find($idcliente);
        $em->remove($c);
        $em->flush();

        return $this->redirectToRoute('cliente_index');
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
