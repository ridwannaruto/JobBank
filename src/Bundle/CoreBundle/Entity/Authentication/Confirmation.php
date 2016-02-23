<?php

namespace Bundle\CoreBundle\Entity\Authentication;

use Doctrine\ORM\Mapping as ORM;

/**
 * Confirmation
 */
class Confirmation
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $verification;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set email
     *
     * @param string $email
     * @return Confirmation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set verification
     *
     * @param string $verification
     * @return Confirmation
     */
    public function setVerification($verification)
    {
        $this->verification = $verification;

        return $this;
    }

    /**
     * Get verification
     *
     * @return string 
     */
    public function getVerification()
    {
        return $this->verification;
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
