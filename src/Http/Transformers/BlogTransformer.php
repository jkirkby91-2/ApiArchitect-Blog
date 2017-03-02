<?php

namespace ApiArchitect\Blog\Http\Transformers;

use ApiArchitect\Blog\Entities\Blog;
use League\Fractal\TransformerAbstract;
use Jkirkby91\Boilers\RestServerBoiler\TransformerContract;

/**
 * Class SearchTransformer
 *
 * @package App\Http\Transformers
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class BlogTransformer extends TransformerAbstract implements TransformerContract
{
    /**
     * @param $address
     * @return array
     */
    public function transform(Blog $blog)
    {
        return [
            'name'                 => $blog->name(),
            'article'              => $blog->article(),            
        ];
    }
}