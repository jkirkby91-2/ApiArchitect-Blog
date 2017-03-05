<?php

namespace ApiArchitect\Blog\Http\Controllers;

use ApiArchitect\Blog\Entities\Blog;
use Psr\Http\Message\ServerRequestInterface;
use Jkirkby91\Boilers\RestServerBoiler\Exceptions;
use Spatie\Fractal\ArraySerializer AS ArraySerialization;
use Jkirkby91\LumenRestServerComponent\Http\Controllers\ResourceController;

/**
 * Class BlogController
 *
 * @package app\Http\Controllers
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class BlogController extends ResourceController 
{
	public function store(ServerRequestInterface $request)
	{
		// dd($request);
		$payload = $request->getParsedBody();
		
		$author = app()->make('em')->getRepository('ApiArchitect\Compass\Entities\User')->findOneBy(['username' => $payload['author']]);

		$blogEntity = $this->repository->store(new Blog(
			$payload['articleBody'],
			str_word_count($payload['articleBody']),
			$author,
			$payload['name']
			)
		);

		$resource = $this->item($blogEntity)->transformWith($this->transformer)->serializeWith(new ArraySerialization)->toArray();

		return $this->createdResponse($resource);
	}
}
