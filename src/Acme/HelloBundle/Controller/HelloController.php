<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloController
{
	public function indexAction($name)
	{
		$html = 'Hello ' . $name;
		return new Response($html);
	}
}

