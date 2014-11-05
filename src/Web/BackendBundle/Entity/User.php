<?php
// src/Acme/UserBundle/Entity/User.php

namespace Web\BackendBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table()
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Document" , mappedBy="user")
     */
    private $document;

    /**
     * @ORM\ManyToMany(targetEntity="Contract", mappedBy="user")
     */
    private $contract;

    /**
     * @ORM\OneToOne(targetEntity="Avatar" , mappedBy="user")
     */
    private $avatar;

    /**
     * @ORM\OneToOne(targetEntity="CalendarColor" , mappedBy="user")
     */
    private $calendarColor;

    public function __construct()
    {
        parent::__construct();
        $this->contract = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @return User
     * @param mixed $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @return User
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract[] = $contract;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return User
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalendarColor()
    {
        return $this->calendarColor;
    }

    /**
     * @return User
     * @param mixed $calendarColor
     */
    public function setCalendarColor($calendarColor)
    {
        $this->calendarColor = $calendarColor;
        return $this;
    }
}