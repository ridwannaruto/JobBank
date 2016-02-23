<?php

namespace Bundle\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 */
class Comment
{
    /**
     * @var integer
     */
    private $user;

    /**
     * @var string
     */
    private $timestamp;

    /**
     * @var integer
     */
    private $project;
    /**
     * @var integer
     */


    /**
     * @var string
     */
    private $comment;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set user
     *
     * @param integer $user
     * @return Comments
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
     * Set timestamp
     *
     * @param string $timestamp
     * @return Comments
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return string 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set project
     *
     * @param integer $project
     * @return Comments
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
     * Set event
     *
     * @param integer $event
     * @return Comments
     */


    /**
     * Set comment
     *
     * @param string $comment
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
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
     * @var integer
     */
    private $task;


    /**
     * Set task
     *
     * @param integer $task
     * @return Comments
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return integer 
     */
    public function getTask()
    {
        return $this->task;
    }
}
