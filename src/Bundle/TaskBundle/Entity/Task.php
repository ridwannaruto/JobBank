<?php

namespace Bundle\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 */
class Task
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $leader;

    /**
     * @var integer
     */
    private $project;

    /**
     * @var integer
     */
    private $weight;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $goals;

    /**
     * @var array
     */
    private $members;

    /**
     * @var string
     */
    private $starttimestamp;

    /**
     * @var string
     */
    private $endtimestamp;

    /**
     * @var string
     */
    private $duetimestamp;

    /**
     * @var integer
     */
    private $id;


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

    /**
     * Set leader
     *
     * @param integer $leader
     * @return Task
     */
    public function setLeader($leader)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get leader
     *
     * @return integer 
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Set project
     *
     * @param integer $project
     * @return Task
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return integer 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Task
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Task
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
     * Set goals
     *
     * @param string $goals
     * @return Task
     */
    public function setGoals($goals)
    {
        $this->goals = $goals;

        return $this;
    }

    /**
     * Get goals
     *
     * @return string 
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Set members
     *
     * @param array $members
     * @return Task
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
     * Set starttimestamp
     *
     * @param string $starttimestamp
     * @return Task
     */
    public function setStarttimestamp($starttimestamp)
    {
        $this->starttimestamp = $starttimestamp;

        return $this;
    }

    /**
     * Get starttimestamp
     *
     * @return string 
     */
    public function getStarttimestamp()
    {
        return $this->starttimestamp;
    }

    /**
     * Set endtimestamp
     *
     * @param string $endtimestamp
     * @return Task
     */
    public function setEndtimestamp($endtimestamp)
    {
        $this->endtimestamp = $endtimestamp;

        return $this;
    }

    /**
     * Get endtimestamp
     *
     * @return string 
     */
    public function getEndtimestamp()
    {
        return $this->endtimestamp;
    }

    /**
     * Set duetimestamp
     *
     * @param string $duetimestamp
     * @return Task
     */
    public function setDuetimestamp($duetimestamp)
    {
        $this->duetimestamp = $duetimestamp;

        return $this;
    }

    /**
     * Get duetimestamp
     *
     * @return string 
     */
    public function getDuetimestamp()
    {
        return $this->duetimestamp;
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
     * @var boolean
     */
    private $completed;

    /**
     * @var integer
     */
    private $type;

    /**
     * @var integer
     */
    private $user;

    /**
     * @var string
     */
    private $comments;


    /**
     * Set completed
     *
     * @param boolean $completed
     * @return Task
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean 
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Task
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Task
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Task
     */
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
    private $pillar;


    /**
     * Set pillar
     *
     * @param string $pillar
     * @return Task
     */
    public function setPillar($pillar)
    {
        $this->pillar = $pillar;

        return $this;
    }

    /**
     * Get pillar
     *
     * @return string 
     */
    public function getPillar()
    {
        return $this->pillar;
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
    
    private $rate;


    /**
     * Set pillar
     *
     * @param string $pillar
     * @return Task
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get pillar
     *
     * @return string 
     */
    public function getRate()
    {
        return $this->rate;
    }
}
