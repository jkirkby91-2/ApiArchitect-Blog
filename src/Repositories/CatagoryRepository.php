<?php

namespace ApiArchitect\Blog\Repositories;

use Jkirkby91\DoctrineRepositories\ResourceRepositoryTrait;
use Jkirkby91\Boilers\RepositoryBoiler\ResourceRepositoryContract;
use Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineEntityRepository;

/**
 * Class CatagoryRepository
 *
 * @package ApiArchitect\Auth\Repositories
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class CatagoryRepository extends LumenDoctrineEntityRepository implements ResourceRepositoryContract
{
    use ResourceRepositoryTrait;
}