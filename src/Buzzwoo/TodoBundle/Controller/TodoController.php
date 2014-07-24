<?php

namespace Buzzwoo\TodoBundle\Controller;

# use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TodoController extends Controller
{
	public function indexAction()
	{
		$tasks = [
			[
				'id' => 1,
				'name' => 'Buy some milke'
			],
			[
				'id' => 2,
				'name' => 'Take some photos'
			]
		];
		return $this->render('BuzzwooTodoBundle:Todo:index.html.twig',
			['tasks' => $tasks]);
	}
}
