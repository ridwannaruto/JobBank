<?php

namespace Bundle\VacancyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @var string
     */
    private $applybeforedate;

    /**
     * @var string
     */
    private $creationdate;

    /**
     * @var string
     */
    private $organizationname;

    /**
     * @var \Bundle\UserBundle\Entity\User
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
     * @param string $applybeforedate
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
     * @return string
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Set organizationname
     *
     * @param string $organizationname
     *
     * @return Vacancy
     */
    public function setOrganizationname($organizationname)
    {
        $this->organizationname = $organizationname;

        return $this;
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
     * @param \Bundle\UserBundle\Entity\User $postedbyuserid
     *
     * @return Vacancy
     */
    public function setPostedbyuserid(\Bundle\UserBundle\Entity\User $postedbyuserid = null)
    {
        $this->postedbyuserid = $postedbyuserid;

        return $this;
    }

    /**
     * Get postedbyuserid
     *
     * @return \Bundle\UserBundle\Entity\User
     */
    public function getPostedbyuserid()
    {
        return $this->postedbyuserid;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * Set postedbyuserid
     *
     * @param integer $id
     *
     * @return Vacancy
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/vacancy/images' . date('Y-m-d H-m-s');
    }

    public function getPath(){
        return $this->path;
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}
