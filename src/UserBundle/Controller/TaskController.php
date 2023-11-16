<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; 
use UserBundle\Entity\Task;
use UserBundle\Form\TaskType;

class TaskController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT t FROM UserBundle:Task t ORDER BY t.id DESC";
        $tasks = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tasks,
            $request->query->getInt('page',1),
            3
        );

        return $this->render('UserBundle:Task:index.html.twig', array('pagination' => $pagination));
    }

    public function addAction()
    {
        $task = new Task();
        $form = $this->createCreateForm($task);

        return $this->render('UserBundle:Task:add.html.twig', array('form' => $form->createView()));
    }

    private function createCreateForm(Task $entity)
    {
        $form = $this->createForm(new TaskType(), $entity, array(
            'action' => $this->generateUrl('task_create'),
            'method' => 'POST'
        ));

        return $form;
    }

    public function createAction(Request $request)
    {
        $task = new Task();
        $form = $this->createCreateForm($task);
        $form->handleRequest($request);

        if($form->isValid())
        {   
            $task->setStatus(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush(); 

            $successMessage = $this->get('translator')->trans('The task has been created.');
            $this->addFlash('mensaje', $successMessage);

            return $this->redirectToRoute('task_index');
        }

        return $this->render('UserBundle:Task:add.html.twig', array('form' => $form->createView()));
    }

    public function viewAction($id)
    {
        $task = $this->getDoctrine()->getRepository('UserBundle:Task')->find($id);

        if(!$task)
        {
            throw $this->createNotFoundException('The task does not exist.');
        }

        $deleteForm = $this->createCustomForm($task->getId(), 'DELETE', 'task_delete');

        $user = $task->getUser();
        
        return $this->render('UserBundle:Task:view.html.twig', array('task' => $task, 'user' => $user, 'delete_form' => $deleteForm->createView()));
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository('UserBundle:Task')->find($id);

        if(!$task)
        {
            throw $this->createNotFoundException('The task does not exist.');
        }

        $form = $this->createEditForm($task);

        return $this->render('UserBundle:Task:edit.html.twig', array('task' => $task, 'form' => $form->createView()));

    }
 
    private function createEditForm(Task $entity)
    {
        $form = $this->createForm(new TaskType(), $entity, array(
            'action' => $this->generateUrl('task_update', array('id' => $entity->getID())),
            'method' => 'PUT'
        ));

        return $form;
    }

    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository('UserBundle:Task')->find($id);

        if(!$task)
        {
            throw $this->createNotFoundException('The task does not exist.');
        }

        $form = $this->createEditForm($task);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $task->setStatus(0);
            $em->flush();
            $successMessage = $this->get('translator')->trans('The task has been modified.');
            $this->addFlash('mensaje', $successMessage);            
            return $this->redirectToRoute('task_index');
        }

        return $this->render('UserBundle:Task:edit.html.twig', array('task' => $task, 'form' => $form->createView()));
    }

    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository('UserBundle:Task')->find($id);

        if(!$task)
        {
            throw $this->createNotFoundException('The task does not exist.');
        }

        $form = $this->createCustomForm($task->getId(), 'DELETE', 'task_delete');
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->remove($task);
            $em->flush();

            $successMessage = $this->get('translator')->trans('The task has been deleted.');
            $this->addFlash('mensaje', $successMessage); 
            
            return $this->redirectToRoute('task_index');
        }
    }

    private function createCustomForm($id, $method, $route)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($route, array('id' => $id)))
            ->setMethod($method)
            ->getForm();
    }
    
    /*
    public function ()
    {

    }

    private function ()
    {

    }
    */
}
