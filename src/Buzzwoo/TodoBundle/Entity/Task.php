<?php

namespace Buzzwoo\TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
class Task
{

	/**
	* @ORM\Column(type="integer")
	* @ORM\id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @ORM\Column(type="string", length=255)
	* @Assert\NotBlank()
	*/
	protected $name;

	/**
	* @ORM\Column(type="boolean")
	*/
	protected $completed;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

		public function setCompleted($completed)
		{
			$this->completed = $completed;
			return $this;
		}

		public function getCompleted()
		{
			return $this->completed;
		}

}
