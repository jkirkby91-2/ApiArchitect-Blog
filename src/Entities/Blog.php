<?php

namespace ApiArchitect\Blog\Entities;

use App\Entities\Thing;
use Doctrine\ORM\Mapping as ORM;
use ApiArchitect\Blog\Entities\Tag;
use ApiArchitect\Blog\Entities\Catagory;
use Doctrine\Common\Collections\ArrayCollection;
use Jkirkby91\DoctrineSchemas\Entities\BlogPosting;

/**
 * Class Blog
 *
 * @ORM\Entity
 * @ORM\Table(name="Blog", indexes={@ORM\Index(name="name_idx", columns={"name"})})
 * @ORM\Entity(repositoryClass="ApiArchitect\Blog\Repositories\BlogRepository")
 * 
 * @package Jkirkby91\DoctrineSchemas
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class Blog Extends BlogPosting 
{
	/**
	 * @var ArrayCollection
	 * @ORM\ManyToMany(targetEntity="Tags", cascade={"all"}, fetch="EAGER")
	 * @ORM\JoinTable(name="blog_tag",
	 *      joinColumns={@ORM\JoinColumn(name="blog_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id", unique=true)})
	 */
	protected $tag;

	/**
	 * @var ArrayCollection
	 * @ORM\ManyToMany(targetEntity="Catagory", cascade={"all"}, fetch="EAGER")
	 * @ORM\JoinTable(name="blog_catagory",
	 *      joinColumns={@ORM\JoinColumn(name="blog_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="catagory_id", referencedColumnName="id", unique=true)})
	 */
	protected $catagory;

	/**
	 * Class Constructor
	 * @param    $tag   
	 * @param    $catagory   
	 */
	public function __construct($auhor, $name)
	{
		parent::__construct($articleBody, $wordCount, $author, $name);

		$this->tag = new ArrayCollection();
		$this->catagory = new ArrayCollection();
	}

	/**
	 * @return ArrayCollection
	 */
	public function getTag() {
		return $this->tag;
	}

	/**
	 * @param Tag $tag
	 * @return $this
	 */
	public function addTag(Tag $tag) {
		if (!$this->tag->contains($tag)) {
			$this->tag->add($tag);
		}
		return $this;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getCatagory() {
		return $this->catagory;
	}

	/**
	 * @param Catagory $catagory
	 * @return $this
	 */
	public function addCatagory(Catagory $catagory) {
		if (!$this->catagory->contains($tag)) {
			$this->catagory->add($catagory);
		}
		return $this;
	}	
}