<?php

namespace Web\FrontendBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * AccountInfo
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Gedmo\Loggable()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class AccountInfo
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
     * @ORM\Column(name="subject", type="string", length=255 , nullable=true)
     */
    private $subject;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="login_url", type="string", length=255 , nullable=true)
     */
    private $loginUrl;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="username", type="string", length=255 , nullable=true)
     */
    private $username;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="password", type="string", length=255 , nullable=true)
     */
    private $password;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="password_protection", type="text" , nullable=true)
     */
    private $passwordProtection;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="description", type="text" , nullable=true)
     */
    private $description;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="link_phone", type="string", length=255 , nullable=true)
     */
    private $linkPhone;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="link_email", type="string", length=255 , nullable=true)
     */
    private $linkEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime" , nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime" , nullable=true)
     */
    private $updatedAt;


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
     * Set subject
     *
     * @param string $subject
     * @return AccountInfo
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set loginUrl
     *
     * @param string $loginUrl
     * @return AccountInfo
     */
    public function setLoginUrl($loginUrl)
    {
        $this->loginUrl = $loginUrl;

        return $this;
    }

    /**
     * Get loginUrl
     *
     * @return string 
     */
    public function getLoginUrl()
    {
        return $this->loginUrl;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return AccountInfo
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
     * @return AccountInfo
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
     * Set passwordProtection
     *
     * @param string $passwordProtection
     * @return AccountInfo
     */
    public function setPasswordProtection($passwordProtection)
    {
        $this->passwordProtection = $passwordProtection;

        return $this;
    }

    /**
     * Get passwordProtection
     *
     * @return string 
     */
    public function getPasswordProtection()
    {
        return $this->passwordProtection;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return AccountInfo
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
     * Set linkPhone
     *
     * @param string $linkPhone
     * @return AccountInfo
     */
    public function setLinkPhone($linkPhone)
    {
        $this->linkPhone = $linkPhone;

        return $this;
    }

    /**
     * Get linkPhone
     *
     * @return string 
     */
    public function getLinkPhone()
    {
        return $this->linkPhone;
    }

    /**
     * Set linkEmail
     *
     * @param string $linkEmail
     * @return AccountInfo
     */
    public function setLinkEmail($linkEmail)
    {
        $this->linkEmail = $linkEmail;

        return $this;
    }

    /**
     * Get linkEmail
     *
     * @return string 
     */
    public function getLinkEmail()
    {
        return $this->linkEmail;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AccountInfo
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return AccountInfo
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return AccountInfo
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
}
