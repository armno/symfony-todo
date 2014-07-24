<?php

namespace Buzzwoo\TodoBundle\Controller;

# use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TodoController extends Controller
{
	public function indexAction()
	{
		return $this->render('BuzzwooTodoBundle:Todo:index.html.twig');
	}
}
