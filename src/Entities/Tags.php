<?php

namespace ApiArchitect\Blog\Entities;

use Jkirkby91\DoctrineSchemas\Entities\Thing;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Catagory
 *
 * @ORM\Entity
 * @ORM\Table(name="tags", indexes={@ORM\Index(name="name_idx", columns={"name"})})
 * @ORM\Entity(repositoryClass="ApiArchitect\Blog\\Repositories\CatagoryRepository")
 * 
 * @package Jkirkby91\DoctrineSchemas
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class Tags Extends Thing {}