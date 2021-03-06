<?php

namespace Buzz\TodoBundle\Entity;

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
	* @ORM\Column(type="datetime", name="created_at")
	*/
	protected $createdAt;

	/**
	* @ORM\Column(type="datetime", name="updated_at")
	*/
	protected $updatedAt;
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

		public function setCreatedAt($createdAt)
		{
			$this->createdAt = $createdAt;
			return $this;
		}

		public function getCreatedAt()
		{
			return $this->createdAt;
		}

		public function setUpdatedAt($updatedAt)
		{
			$this->updatedAt = $updatedAt;
			return $this;
		}

		public function getUpdatedAt()
		{
			return $this->updatedAt;
		}
}
