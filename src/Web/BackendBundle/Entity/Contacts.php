<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacts
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Web\BackendBundle\Entity\ContactsRepository")
 */
class Contacts
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="bigint")
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="Position" , inversedBy="contacts")
     * @ORM\JoinColumn(name="position_id" , referencedColumnName="id")
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="position_id", type="integer" , nullable=true)
     */
    private $positionId;

    /**
     * @ORM\ManyToOne(targetEntity="Company" , inversedBy="contacts")
     * @ORM\JoinColumn(name="company_id" , referencedColumnName="id")
     */
    private $company;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer" , nullable=true)
     */
    private $companyId;

    /**
     * @ORM\ManyToOne(targetEntity="Stage" , inversedBy="contacts")
     * @ORM\JoinColumn(name="stage_id" , referencedColumnName="id")
     */
    private $stage;

    /**
     * @var integer
     *
     * @ORM\Column(name="stage_id", type="integer" , nullable=true)
     */
    private $stageId;

    /**
     * @ORM\ManyToOne(targetEntity="User" , inversedBy="contacts")
     * @ORM\JoinColumn(name="created_by" , referencedColumnName="id")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer")
     */
    private $createdBy;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
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
     * Set name
     *
     * @param string $name
     * @return Contacts
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
     * Set email
     *
     * @param string $email
     * @return Contacts
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
     * Set phone
     *
     * @param integer $phone
     * @return Contacts
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Contacts
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set company
     *
     * @param integer $company
     * @return Contacts
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return integer 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set stage
     *
     * @param integer $stage
     * @return Contacts
     */
    public function setStage($stage)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return integer 
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Contacts
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contacts
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
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return Contacts
     * @param int $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPositionId()
    {
        return $this->positionId;
    }

    /**
     * @return Contacts
     * @param int $positionId
     */
    public function setPositionId($positionId)
    {
        $this->positionId = $positionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStageId()
    {
        return $this->stageId;
    }

    /**
     * @return Contacts
     * @param int $stageId
     */
    public function setStageId($stageId)
    {
        $this->stageId = $stageId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Contacts
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


}
