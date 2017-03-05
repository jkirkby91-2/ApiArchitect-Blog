<?php

namespace ApiArchitect\Blog\Http\Middleware;

use Closure;
use Psr\Http\Message\ServerRequestInterface;
use Jkirkby91\LumenRestServerComponent\Http\Middleware\ValidateRequestMiddleware as ValidatedRequest;

/**
 * Class BlogRequest
 *
 * @package Api\Requests
 * @author James Kirkby <hello@jameskirkby.com>
 */
class BlogRequestValidationMiddleware extends ValidatedRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author James Kirkby <hello@jameskirkby.com>
     */
    public function rules()
    {
        return  [ 
            'POST' => [
                'articleBody'           => 'required',
                'author'                => 'required|exists:users,username',
                'name'                  => 'required'
            ]
        ];
    }

    /**
     * 
     */
    public function handle(ServerRequestInterface $request, Closure $next)
    {
        $this->validateRequest($request);
        $next($request);
    } 
}