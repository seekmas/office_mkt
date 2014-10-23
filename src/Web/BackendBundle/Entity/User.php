<?php
// src/Acme/UserBundle/Entity/User.php

namespace Web\BackendBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;

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

    public function __construct()
    {
        parent::__construct();
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
}