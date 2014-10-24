<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="full_name", type="string", length=255)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="short_name", type="string", length=255)
     */
    private $shortName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="leader_name", type="string", length=255)
     */
    private $leaderName;

    /**
     * @var string
     *
     * @ORM\Column(name="leader_email", type="string", length=255)
     */
    private $leaderEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="leader_phone", type="string", length=255)
     */
    private $leaderPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="text")
     */
    private $remark;

    /**
     * @ORM\ManyToOne(targetEntity="User" , inversedBy="client")
     * @ORM\JoinColumn(name="user_id" , referencedColumnName="id")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity="Attachment" , mappedBy="client")
     */
    private $attachment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="Contract" , mappedBy="client")
     */
    private $contract;


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
     * Set fullName
     *
     * @param string $fullName
     * @return Client
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     * @return Client
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Client
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
     * Set leaderName
     *
     * @param string $leaderName
     * @return Client
     */
    public function setLeaderName($leaderName)
    {
        $this->leaderName = $leaderName;

        return $this;
    }

    /**
     * Get leaderName
     *
     * @return string 
     */
    public function getLeaderName()
    {
        return $this->leaderName;
    }

    /**
     * Set leaderEmail
     *
     * @param string $leaderEmail
     * @return Client
     */
    public function setLeaderEmail($leaderEmail)
    {
        $this->leaderEmail = $leaderEmail;

        return $this;
    }

    /**
     * Get leaderEmail
     *
     * @return string 
     */
    public function getLeaderEmail()
    {
        return $this->leaderEmail;
    }

    /**
     * Set leaderPhone
     *
     * @param string $leaderPhone
     * @return Client
     */
    public function setLeaderPhone($leaderPhone)
    {
        $this->leaderPhone = $leaderPhone;

        return $this;
    }

    /**
     * Get leaderPhone
     *
     * @return string 
     */
    public function getLeaderPhone()
    {
        return $this->leaderPhone;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Client
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Client
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @return Client
     * @param mixed $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
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
     * @return Client
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Client
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
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @return Client
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
        return $this;
    }

    public function __toString()
    {
        return $this->getFullName() . ' - ' . $this->getShortName();
    }
}
