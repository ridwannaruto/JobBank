<?php

namespace Bundle\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 */
class Project
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var \DateTime
     */
    private $due;

    /**
     * @var integer
     */
    private $manager;

    /**
     * @var array
     */
    private $events;

    /**
     * @var array
     */
    private $members;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $objectives;

    /**
     * @var integer
     */
    private $id;

    
    private $status;
    /**
     * Set name
     *
     * @param string $name
     * @return Project
     */
    
    public function setStatus($status){
        $this->status = $status;

        return $this;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
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
     * Set start
     *
     * @param \DateTime $start
     * @return Project
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Project
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set due
     *
     * @param \DateTime $due
     * @return Project
     */
    public function setDue($due)
    {
        $this->due = $due;

        return $this;
    }

    /**
     * Get due
     *
     * @return \DateTime 
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * Set manager
     *
     * @param integer $manager
     * @return Project
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return integer 
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set events
     *
     * @param array $events
     * @return Project
     */
 
    /**
     * Set members
     *
     * @param array $members
     * @return Project
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * Get members
     *
     * @return array 
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set objectives
     *
     * @param string $objectives
     * @return Project
     */
    public function setObjectives($objectives)
    {
        $this->objectives = $objectives;

        return $this;
    }

    /**
     * Get objectives
     *
     * @return string 
     */
    public function getObjectives()
    {
        return $this->objectives;
    }

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
     * @var array
     */
    private $tasks;


    /**
     * Set tasks
     *
     * @param array $tasks
     * @return Project
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return array 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
    
     private $subscribers;


    /**
     * Set pillar
     *
     * @param string $pillar
     * @return Task
     */
    public function setSubscribers($subscribers)
    {
        $this->subscribers = $subscribers;

        return $this;
    }

    /**
     * Get pillar
     *
     * @return string 
     */
    public function getSubscribers()
    {
        return $this->subscribers;
    }
    
    
    
    private $comments;
    
     public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }
    /**
     * @var string
     */
}
