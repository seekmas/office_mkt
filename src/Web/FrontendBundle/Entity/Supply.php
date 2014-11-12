<?php

namespace Web\FrontendBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Supply
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Gedmo\Loggable()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Supply
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
     * @Gedmo\Versioned
     * @ORM\Column(name="name", type="string", length=255 , nullable=true)
     */
    private $name;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="person_name", type="string", length=255 , nullable=true)
     */
    private $personName;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="person_phone", type="string", length=255 , nullable=true)
     */
    private $personPhone;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="person_duty", type="string", length=255 , nullable=true)
     */
    private $personDuty;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="company_address", type="string", length=255 , nullable=true)
     */
    private $companyAddress;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="city", type="string", length=255 , nullable=true)
     */
    private $city;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="postcode", type="integer" , nullable=true)
     */
    private $postcode;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="country", type="string", length=255 , nullable=true)
     */
    private $country;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="fax", type="string", length=255 , nullable=true)
     */
    private $fax;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="email", type="string", length=255 , nullable=true)
     */
    private $email;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="notes", type="string", length=255 , nullable=true)
     */
    private $notes;

    /**
     * @var \DateTime
     * @Gedmo\Versioned
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime" , nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime" , nullable=true)
     */
    private $deletedAt;

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
     * @return Supply
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
     * Set personName
     *
     * @param string $personName
     * @return Supply
     */
    public function setPersonName($personName)
    {
        $this->personName = $personName;

        return $this;
    }

    /**
     * Get personName
     *
     * @return string 
     */
    public function getPersonName()
    {
        return $this->personName;
    }

    /**
     * Set personPhone
     *
     * @param string $personPhone
     * @return Supply
     */
    public function setPersonPhone($personPhone)
    {
        $this->personPhone = $personPhone;

        return $this;
    }

    /**
     * Get personPhone
     *
     * @return string 
     */
    public function getPersonPhone()
    {
        return $this->personPhone;
    }

    /**
     * Set personDuty
     *
     * @param string $personDuty
     * @return Supply
     */
    public function setPersonDuty($personDuty)
    {
        $this->personDuty = $personDuty;

        return $this;
    }

    /**
     * Get personDuty
     *
     * @return string 
     */
    public function getPersonDuty()
    {
        return $this->personDuty;
    }

    /**
     * Set companyAddress
     *
     * @param string $companyAddress
     * @return Supply
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return string 
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Supply
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
     * Set postcode
     *
     * @param integer $postcode
     * @return Supply
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return integer 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Supply
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
     * Set fax
     *
     * @param string $fax
     * @return Supply
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Supply
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
     * Set notes
     *
     * @param string $notes
     * @return Supply
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Supply
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Supply
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @return Supply
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

}
