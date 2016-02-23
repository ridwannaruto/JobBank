<?php

namespace Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $phonenumber;

    /**
     * @var \DateTime
     */
    private $dateofbirth;

    /**
     * @var string
     */
    private $namewithinitials;

    /**
     * @var string
     */
    private $nic;

    /**
     * @var string
     */
    private $mobilenumber;

    /**
     * @var string
     */
    private $accesslevel;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $pillar;

    /**
     * @var string
     */
    private $department;

    /**
     * @var boolean
     */
    private $batch;

    /**
     * @var string
     */
    private $skills;

    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var string
     */
    private $fullName;



    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }
    
  

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     * @return User
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return string 
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set dateofbirth
     *
     * @param \DateTime $dateofbirth
     * @return User
     */
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    /**
     * Get dateofbirth
     *
     * @return \DateTime 
     */
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Set namewithinitials
     *
     * @param string $namewithinitials
     * @return User
     */
    public function setNamewithinitials($namewithinitials)
    {
        $this->namewithinitials = $namewithinitials;

        return $this;
    }

    /**
     * Get namewithinitials
     *
     * @return string 
     */
    public function getNamewithinitials()
    {
        return $this->namewithinitials;
    }

    /**
     * Set nic
     *
     * @param string $nic
     * @return User
     */
    public function setNic($nic)
    {
        $this->nic = $nic;

        return $this;
    }

    /**
     * Get nic
     *
     * @return string 
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * Set mobilenumber
     *
     * @param string $mobilenumber
     * @return User
     */
    public function setMobilenumber($mobilenumber)
    {
        $this->mobilenumber = $mobilenumber;

        return $this;
    }

    /**
     * Get mobilenumber
     *
     * @return string 
     */
    public function getMobilenumber()
    {
        return $this->mobilenumber;
    }

    /**
     * Set accesslevel
     *
     * @param string $accesslevel
     * @return User
     */
    public function setAccesslevel($accesslevel)
    {
        $this->accesslevel = $accesslevel;

        return $this;
    }

    /**
     * Get accesslevel
     *
     * @return string 
     */
    public function getAccesslevel()
    {
        return $this->accesslevel;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set pillar
     *
     * @param string $pillar
     * @return User
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

    /**
     * Set department
     *
     * @param string $department
     * @return User
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set batch
     *
     * @param boolean $batch
     * @return User
     */
    public function setBatch($batch)
    {
        $this->batch = $batch;

        return $this;
    }

    /**
     * Get batch
     *
     * @return boolean 
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return User
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return string 
     */
    public function getSkills()
    {
        return $this->skills;
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
    private $status;


    /**
     * Set status
     *
     * @param boolean $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
     private $path;


    /**
     * Set status
     *
     * @param boolean $status
     * @return User
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getPath()
    {
        return $this->path;
    }
    
     private $lastlogin;


    /**
     * Set status
     *
     * @param boolean $status
     * @return User
     */
     
    public function setLastlogin($login)
    {
        $this->lastlogin = $login;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getLastlogin()
    {
        return $this->lastlogin;
    }
    
     /**
     * Get fullname
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->firstname.' '.$this->lastname;
    }
    
    
    
}