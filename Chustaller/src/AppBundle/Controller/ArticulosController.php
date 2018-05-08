<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Articulos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Articulo controller.
 *
 * @Route("")
 */
class ArticulosController extends Controller
{
    /**
     * Lists all articulo entities.
     *
     * @Route("/Admin/Articulos", name="articulos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articulos = $em->getRepository('AppBundle:Articulos')->findAll();
       
        return $this->render('admin/articulos.html.twig', array(
            'articulos' => $articulos,
        ));
    }

    /**
     * Creates a new articulo entity.
     *
     * @Route("Admin/Articulos/new", name="articulos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $articulo = new Articulos();
        $form = $this->createForm('AppBundle\Form\ArticulosType', $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $file=$form["imagen"]->getData();
            $ext = $file->guessExtension();
            $file_name = $articulo->getNombre().".".$ext;
            $file->move("img/", $file_name);
            $articulo->setImagen($file_name);
            $em->persist($articulo);
            $em->flush();

            return $this->redirectToRoute('articulos_index');
        }

        return $this->render('admin/articulosnew.html.twig', array(
            'articulo' => $articulo,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing articulo entity.
     *
     * @Route("Admin/Articulos/{id}/edit", name="articulos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Articulos $articulo, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $articulos = $em->getRepository('AppBundle:Articulos')->find($id);
        $file_name=$articulos->getImagen();
        $deleteForm = $this->createDeleteForm($articulo);
        $editForm = $this->createForm('AppBundle\Form\ArticulosType', $articulo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file=$editForm["imagen"]->getData();
            if($file==null){
                
                $articulo->setImagen($file_name);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('articulos_index');
            }else{
                $ext = $file->guessExtension();
                $file_name = $articulo->getNombre().".".$ext;
                $file->move("img/", $file_name);
                $articulo->setImagen($file_name);
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('articulos_index');
            }
            
        }

        return $this->render('admin/articulosedit.html.twig', array(
            'articulo' => $articulo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a articulo entity.
     *
     * @Route("Admin/Articulos/{id}", name="articulos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Articulos $articulo, $id)
    {
        $form = $this->createDeleteForm($articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $articulos = $em->getRepository('AppBundle:Articulos')->find($id);
            $file_name=$articulos->getImagen();
            unlink("img/".$file_name);
            $em->remove($articulo);
            $em->flush();
        }

        return $this->redirectToRoute('articulos_index');
    }

    /**
     * Creates a form to delete a articulo entity.
     *
     * @param Articulos $articulo The articulo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Articulos $articulo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articulos_delete', array('id' => $articulo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function imgAction($id)
    {    
        $em = $this->get('doctrine')->getManager();
        $image_obj = $em->getRepository('AppBundle\Entity\Articulos')->find($id);
        
        return new Response(
            $image_obj->getImagen(),
            Response::HTTP_OK,
            array('content-type' => 'image/jpeg'));
        }
        
}
