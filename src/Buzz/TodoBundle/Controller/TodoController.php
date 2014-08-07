<?php

namespace Buzz\TodoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Buzz\TodoBundle\Entity\Task;

class TodoController extends Controller
{
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getRepository('BuzzTodoBundle:Task');
		$unfinishedTasks = $repository->findByCompleted(0);
		$finishedTasks = $repository->findByCompleted(1);

		return $this->render('BuzzTodoBundle:Todo:index.html.twig',
			['unfinished' => $unfinishedTasks,
			'finished' => $finishedTasks]);
	}

	public function createAction(Request $request)
	{
		$task = new Task();
		$task->setCompleted(0);
		$form = $this->createFormBuilder($task)
			->add('name', 'text')
			->add('save', 'submit')
			->getForm();

		$form->handleRequest($request);

		if ($form->isValid())
		{
			// save new todo item into the database
			$task->setCreatedAt(new \DateTime('now'));
			$em = $this->getDoctrine()->getManager();
			$em->persist($task);
			$em->flush();

			return $this->redirect($this->generateUrl('home'));
		}

		return $this->render(
			'BuzzTodoBundle:Todo:create.html.twig',
			['form' => $form->createView()
		]);
	}

	public function updateAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$task = $em->getRepository('BuzzTodoBundle:Task')->find($id);
		if (!$task)
		{
			throw $this->createNotFoundException(
				'No tasks found'
			);
		}
		$task->setCompleted(1);
		$task->setUpdatedAt(new \DateTime('now'));
		$em->flush();
		return $this->redirect($this->generateUrl('home'));
	}

	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$task = $em->getRepository('BuzzTodoBundle:Task')->find($id);
		if (!$task)
		{
			throw $this->createNotFoundException(
				'No tasks found'
			);
		}
		$em->remove($task);
		$em->flush();
		return $this->redirect($this->generateUrl('home'));
	}
}
