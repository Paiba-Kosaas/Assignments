<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;
use UserBundle\Entity\Contact;
use UserBundle\Form\ContactType;

class ContactController extends Controller
{
    /**
     * Función para generar vista inicial de contacto
     * @author Pablo Ibañez <pablo.ibanez@eurotransportcar.com>
     * @param Request $request
     * @return array $result
     */
    public function indexAction()
    {
        $contact = new Contact();
        $form = $this->handlerCreateForm($contact);

        return $this->render('UserBundle:Contact:index.html.twig', array('form' => $form->createView()));
    }

    /**
     * Función manejadora del formulario a crear
     * @author Pablo Ibañez <pablo.ibanez@eurotransportcar.com>
     * @param Contact $entity
     * @return $form
     */
    private function handlerCreateForm(Contact $entity)
    {
        $form = $this->createForm(new ContactType(), $entity, array(
            'action' => $this->generateUrl('contact_create'),
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * Función para crear el formulario de contacto
     * @author Pablo Ibañez <pablo.ibanez@eurotransportcar.com>
     * @param Request $request
     * @return array $result
     */
    public function createAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->handlerCreateForm($contact);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $successMessage = $this->get('translator')->trans('The query has been created.');
            $this->addFlash('mensaje', $successMessage);

            return $this->redirectToRoute('contact_index'); 

        }

        return $this->render('UserBundle:Contact:index.html.twig', array('form' => $form->createView()));
    }
}
