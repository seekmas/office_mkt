<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Company
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
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Industry" , inversedBy="company")
     * @ORM\JoinColumn(name="industry_id" , referencedColumnName="id")
     */
    private $industry;

    /**
     * @var integer
     *
     * @ORM\Column(name="industry_id", type="integer")
     */
    private $industryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="province", type="string", length=255)
     */
    private $province;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="User" , inversedBy="company")
     * @ORM\JoinColumn(name="user_id" , referencedColumnName="id")
     */
    private $createdBy;

    /**
     @ORM\Column(name="user_id" , type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(name="created_at" , type="datetime")
     */
    private $createdAt;

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
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return Company
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return Company
     * @param int $city
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return Company
     * @param int $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Company
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @return Company
     * @param mixed $industry
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
        return $this;
    }

    /**
     * @return int
     */
    public function getIndustryId()
    {
        return $this->industryId;
    }

    /**
     * @return Company
     * @param int $industryId
     */
    public function setIndustryId($industryId)
    {
        $this->industryId = $industryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Company
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @return Company
     * @param int $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return Company
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @return Company
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return Company
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    function __toString()
    {
        return $this->getName();
    }


}
