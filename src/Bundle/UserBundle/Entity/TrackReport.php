<?php

namespace Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trackreport
 */
class TrackReport
{
    /**
     * @var integer
     */
    private $user;

    /**
     * @var float
     */
    private $overallrating;

    /**
     * @var integer
     */
    private $totalweight;

    /**
     * @var array
     */
    private $tasks;

    /**
     * @var array
     */
    private $comments;

    /**
     * @var array
     */
    private $projects;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set user
     *
     * @param integer $user
     * @return Trackreport
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
     * Set overallrating
     *
     * @param float $overallrating
     * @return Trackreport
     */
    public function setOverallrating($overallrating)
    {
        $this->overallrating = $overallrating;

        return $this;
    }

    /**
     * Get overallrating
     *
     * @return float 
     */
    public function getOverallrating()
    {
        return $this->overallrating;
    }

    /**
     * Set totalweight
     *
     * @param integer $totalweight
     * @return Trackreport
     */
    public function setTotalweight($totalweight)
    {
        $this->totalweight = $totalweight;

        return $this;
    }

    /**
     * Get totalweight
     *
     * @return integer 
     */
    public function getTotalweight()
    {
        return $this->totalweight;
    }

    /**
     * Set eventhistory
     *
     * @param array $eventhistory
     * @return Trackreport
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get eventhistory
     *
     * @return array 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set comments
     *
     * @param array $comments
     * @return Trackreport
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return array 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set projecthistory
     *
     * @param array $projecthistory
     * @return Trackreport
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projecthistory
     *
     * @return array 
     */
    public function getProjects()
    {
        return $this->projects;
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
}
