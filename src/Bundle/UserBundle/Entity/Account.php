<?php

namespace Bundle\UserBundle\Entity;



/**
 * Confirmation
 */
class Account
{
    /**
     * @var string


    /**
     * @var string
     */
    private $currentpassword;

    /**
     * @var integer
     */
    private $newpassword;
    private $confirmpassword;

    /**
     * Set email
     *
     * @param string $email
     * @return Confirmation
     */
 
    
    public function setCurrentpassword($password)
    {
        $this->currentpassword = $password;

        return $this;
    }
    
    public function setNewpassword($password)
    {
        $this->newpassword = $password;

        return $this;
    }
    
    public function setConfirmpassword($password)
    {
        $this->confirmpassword = $password;

        return $this;
    }
    
 

    /**
     * Get email
     *
     * @return string 
     */

    /**
     * Set verification
     *
     * @param string $verification
     * @return Confirmation
     */
    public function getCurrentpassword()
    {
        return $this->currentpassword ;

         
    }
    
    public function getNewpassword()
    {
       return $this->newpassword;

    }
    
    public function getConfirmpassword()
    {
        return $this->confirmpassword  ;

    }
}