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
        return $this->render('UserBundle:Contact:index.html.twig');
    }

    /**
     * Función para generar vista inicial de contacto
     * @author Pablo Ibañez <pablo.ibanez@eurotransportcar.com>
     * @param Request $request
     * @return array $result
     */
    public function addContactAction(Request $request){

        $data = $request->request->all();

        $result = $contactService->create(
            $data
        );

        return new JsonResponse(
            $data['code'],
            $data['data']
        );
    }

}
