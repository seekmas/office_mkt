<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attachment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Attachment
{

    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text")
     */
    private $path;

    /**
     * @ORM\Column(name="mime" , type="string" , length=255)
     */
    private $mime;
    /**
     * @var string
     *
     * @ORM\Column(name="md5", type="string", length=255)
     */
    private $md5;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="User" , inversedBy="attachment")
     * @ORM\JoinColumn(name="user_id" , referencedColumnName="id")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer" , nullable=true)
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="Document" , inversedBy="attachment")
     * @ORM\JoinColumn(name="document_id" , referencedColumnName="id")
     */
    private $document;

    /**
     * @ORM\Column(name="document_id" , type="integer" , nullable=true )
     */
    private $documentId;

    /**
     * @ORM\ManyToOne(targetEntity="Web\BackendBundle\Entity\Sharing\Category" , inversedBy="attachment")
     * @ORM\JoinColumn(name="sharing_id" , referencedColumnName="id")
     */
    private $sharing;

    /**
     * @ORM\Column(name="sharing_id" , type="integer" , nullable=true)
     */
    private $sharingId;

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
     * Set file
     *
     * @param string $file
     * @return Attachment
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Attachment
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * @return Attachment
     * @param mixed $mime
     */
    public function setMime($mime)
    {
        $this->mime = $mime;
        return $this;
    }

    /**
     * Set md5
     *
     * @param string $md5
     * @return Attachment
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;

        return $this;
    }

    /**
     * Get md5
     *
     * @return string 
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Attachment
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Attachment
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Attachment
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
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @return Attachment
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
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * @return Attachment
     * @param mixed $documentId
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSharing()
    {
        return $this->sharing;
    }

    /**
     * @return Attachment
     * @param mixed $sharing
     */
    public function setSharing($sharing)
    {
        $this->sharing = $sharing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSharingId()
    {
        return $this->sharingId;
    }

    /**
     * @return Attachment
     * @param mixed $sharingId
     */
    public function setSharingId($sharingId)
    {
        $this->sharingId = $sharingId;
        return $this;
    }


}
