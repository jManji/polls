<?php

namespace stathis\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollOption
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PollOption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Poll", inversedBy="pollOptions")
     *
     * @var Poll $poll
     */
    private $poll;

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
     * @return PollOption
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

    /**
     * Set poll
     *
     * @param \stathis\RestBundle\Entity\Poll $poll
     * @return PollOption
     */
    public function setPoll(\stathis\RestBundle\Entity\Poll $poll = null)
    {
        $this->poll = $poll;

        return $this;
    }

    /**
     * Get poll
     *
     * @return \stathis\RestBundle\Entity\Poll 
     */
    public function getPoll()
    {
        return $this->poll;
    }
}
