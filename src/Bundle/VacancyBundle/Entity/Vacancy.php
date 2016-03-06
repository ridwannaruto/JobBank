<?php

namespace Bundle\VacancyBundle\Entity;

/**
 * Vacancy
 */
class Vacancy
{
    /**
     * @var string
     */
    private $contactname;

    /**
     * @var string
     */
    private $contactdesignation;

    /**
     * @var string
     */
    private $contactemail;

    /**
     * @var string
     */
    private $contactnumber;

    /**
     * @var string
     */
    private $availableposition;

    /**
     * @var integer
     */
    private $noofvacancies;

    /**
     * @var string
     */
    private $heading;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $imagepath;

    /**
     * @var \DateTime
     */
    private $applybeforedate;

    /**
     * @var \DateTime
     */
    private $creationdate;

    /**
     * @var string
     */
    private $organizationname;

    /**
     * @var \Bundle\VacancyBundle\Entity\User
     */
    private $postedbyuserid;


    /**
     * Set contactname
     *
     * @param string $contactname
     *
     * @return Vacancy
     */
    public function setContactname($contactname)
    {
        $this->contactname = $contactname;

        return $this;
    }

    /**
     * Get contactname
     *
     * @return string
     */
    public function getContactname()
    {
        return $this->contactname;
    }

    /**
     * Set contactdesignation
     *
     * @param string $contactdesignation
     *
     * @return Vacancy
     */
    public function setContactdesignation($contactdesignation)
    {
        $this->contactdesignation = $contactdesignation;

        return $this;
    }

    /**
     * Get contactdesignation
     *
     * @return string
     */
    public function getContactdesignation()
    {
        return $this->contactdesignation;
    }

    /**
     * Set contactemail
     *
     * @param string $contactemail
     *
     * @return Vacancy
     */
    public function setContactemail($contactemail)
    {
        $this->contactemail = $contactemail;

        return $this;
    }

    /**
     * Get contactemail
     *
     * @return string
     */
    public function getContactemail()
    {
        return $this->contactemail;
    }

    /**
     * Set contactnumber
     *
     * @param string $contactnumber
     *
     * @return Vacancy
     */
    public function setContactnumber($contactnumber)
    {
        $this->contactnumber = $contactnumber;

        return $this;
    }

    /**
     * Get contactnumber
     *
     * @return string
     */
    public function getContactnumber()
    {
        return $this->contactnumber;
    }

    /**
     * Set availableposition
     *
     * @param string $availableposition
     *
     * @return Vacancy
     */
    public function setAvailableposition($availableposition)
    {
        $this->availableposition = $availableposition;

        return $this;
    }

    /**
     * Get availableposition
     *
     * @return string
     */
    public function getAvailableposition()
    {
        return $this->availableposition;
    }

    /**
     * Set noofvacancies
     *
     * @param integer $noofvacancies
     *
     * @return Vacancy
     */
    public function setNoofvacancies($noofvacancies)
    {
        $this->noofvacancies = $noofvacancies;

        return $this;
    }

    /**
     * Get noofvacancies
     *
     * @return integer
     */
    public function getNoofvacancies()
    {
        return $this->noofvacancies;
    }

    /**
     * Set heading
     *
     * @param string $heading
     *
     * @return Vacancy
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get heading
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Vacancy
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
     * Set imagepath
     *
     * @param string $imagepath
     *
     * @return Vacancy
     */
    public function setImagepath($imagepath)
    {
        $this->imagepath = $imagepath;

        return $this;
    }

    /**
     * Get imagepath
     *
     * @return string
     */
    public function getImagepath()
    {
        return $this->imagepath;
    }

    /**
     * Set applybeforedate
     *
     * @param \DateTime $applybeforedate
     *
     * @return Vacancy
     */
    public function setApplybeforedate($applybeforedate)
    {
        $this->applybeforedate = $applybeforedate;

        return $this;
    }

    /**
     * Get applybeforedate
     *
     * @return \DateTime
     */
    public function getApplybeforedate()
    {
        return $this->applybeforedate;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return Vacancy
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Get organizationname
     *
     * @return string
     */
    public function getOrganizationname()
    {
        return $this->organizationname;
    }

    /**
     * Set postedbyuserid
     *
     * @param \Bundle\VacancyBundle\Entity\User $postedbyuserid
     *
     * @return Vacancy
     */
    public function setPostedbyuserid(\Bundle\VacancyBundle\Entity\User $postedbyuserid = null)
    {
        $this->postedbyuserid = $postedbyuserid;

        return $this;
    }

    /**
     * Get postedbyuserid
     *
     * @return \Bundle\VacancyBundle\Entity\User
     */
    public function getPostedbyuserid()
    {
        return $this->postedbyuserid;
    }
}

