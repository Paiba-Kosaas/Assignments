<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;
use UserBundle\Entity\Contact;
use UserBundle\Form\ContactType;

class ContactController extends Controller
{
    protected $container;
    private $em;
    private $contactService;

    public function setContainer(ContainerInterface $container = null) {

        parent::setContainer($container);

        $this->em                           = $this->getDoctrine()->getManager();
        $this->contactService               = $this->get('contact_service');
    }

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

       
        $result = $this->contactService->validateDataForm($request->request->all());

        if(!$result['status']){
            return new JsonResponse(
                $result
            );
        }
        
        return new JsonResponse($this->contactService->insertContact($request->request->all()));
    }

}
