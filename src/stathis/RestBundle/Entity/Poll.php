<?php

namespace stathis\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poll
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Poll
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
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="PollOption", mappedBy="poll")
     *
     * @var Doctrine\Common\Collections\Collection $pollOptions
     */
    private $pollOptions;
    
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
     * @return Poll
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
     * Constructor
     */
    public function __construct()
    {
        $this->pollOptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pollOptions
     *
     * @param \stathis\RestBundle\Entity\PollOption $pollOptions
     * @return Poll
     */
    public function addPollOption(\stathis\RestBundle\Entity\PollOption $pollOptions)
    {
        $this->pollOptions[] = $pollOptions;

        return $this;
    }

    /**
     * Remove pollOptions
     *
     * @param \stathis\RestBundle\Entity\PollOption $pollOptions
     */
    public function removePollOption(\stathis\RestBundle\Entity\PollOption $pollOptions)
    {
        $this->pollOptions->removeElement($pollOptions);
    }

    /**
     * Get pollOptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPollOptions()
    {
        return $this->pollOptions;
    }
}
