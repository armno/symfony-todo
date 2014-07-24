<?php

namespace Buzzwoo\TodoBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Buzzwoo\TodoBundle\Entity\Task;

class TodoController extends Controller
{
	public function indexAction()
	{
		$tasks = $this->getDoctrine()
			->getRepository('BuzzwooTodoBundle:Task')
			->findAll();
		return $this->render('BuzzwooTodoBundle:Todo:index.html.twig',
			['tasks' => $tasks]);
	}

	public function createAction()
	{
		$task = new Task();
		$task->setName('Buy some milk');

		$em = $this->getDoctrine()->getManager();
		$em->persist($task);
		$em->flush();

		return new Response('Create task id ' . $task->getId());
	}
}
