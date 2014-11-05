<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceItem
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InvoiceItem
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime" , nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(name="signals" , type="string" , length=255 , nullable=true)
     */
    private $signals;

    /**
     * @ORM\Column(name="invoice_date" , type="date" , nullable=true)
     */
    private $invoiceDate;

    /**
     *
     * @ORM\ManyToOne(targetEntity="InvoiceType", inversedBy="invoiceType_id")
     * @ORM\JoinColumn(name="invoiceType_id" , referencedColumnName="id")
     */
    private $invoiceType;

    /**
     * @ORM\Column(name="invoiceType_id" , type="integer" , nullable=true)
     */
    private $invoiceTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="etc", type="text" , nullable=true)
     */
    private $etc;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Attachment" , mappedBy="invoiceItem")
     */
    private $attachment;

    /**
     * @var string
     *
     * @ORM\Column(name="total_number", type="decimal" , nullable=true)
     */
    private $totalNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="total_word", type="string", length=255 , nullable=true)
     */
    private $totalWord;

    /**
     * @ORM\ManyToOne(targetEntity="Contract" , inversedBy="invoiceItem")
     * @ORM\JoinColumn(name="contract_id" , referencedColumnName="id")
     */
    private $contract;

    /**
     * @ORM\Column(name="contract_id" , type="integer")
     */
    private $contractId;

    /**
     * @ORM\ManyToOne(targetEntity="User" , inversedBy="invoiceItem")
     * @ORM\JoinColumn(name="user_id" , referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(name="user_id" , type="integer")
     */
    private $userId;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return InvoiceItem
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
    public function getSignal()
    {
        return $this->signal;
    }

    /**
     * @return InvoiceItem
     * @param mixed $signal
     */
    public function setSignal($signal)
    {
        $this->signal = $signal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @return InvoiceItem
     * @param mixed $invoiceDate
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getInvoiceType()
    {
        return $this->invoiceType;
    }

    /**
     * @return InvoiceItem
     * @param int $invoiceType
     */
    public function setInvoiceType($invoiceType)
    {
        $this->invoiceType = $invoiceType;
        return $this;
    }

    /**
     * Set etc
     *
     * @param string $etc
     * @return InvoiceItem
     */
    public function setEtc($etc)
    {
        $this->etc = $etc;

        return $this;
    }

    /**
     * Get etc
     *
     * @return string 
     */
    public function getEtc()
    {
        return $this->etc;
    }

    /**
     * @return string
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @return InvoiceItem
     * @param string $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
        return $this;
    }

    /**
     * Set totalNumber
     *
     * @param string $totalNumber
     * @return InvoiceItem
     */
    public function setTotalNumber($totalNumber)
    {
        $this->totalNumber = $totalNumber;

        return $this;
    }

    /**
     * Get totalNumber
     *
     * @return string 
     */
    public function getTotalNumber()
    {
        return $this->totalNumber;
    }

    /**
     * Set totalWord
     *
     * @param string $totalWord
     * @return InvoiceItem
     */
    public function setTotalWord($totalWord)
    {
        $this->totalWord = $totalWord;

        return $this;
    }

    /**
     * Get totalWord
     *
     * @return string 
     */
    public function getTotalWord()
    {
        return $this->totalWord;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @return InvoiceItem
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * @return InvoiceItem
     * @param mixed $contractId
     */
    public function setContractId($contractId)
    {
        $this->contractId = $contractId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceTypeId()
    {
        return $this->invoiceTypeId;
    }

    /**
     * @return InvoiceItem
     * @param mixed $invoiceTypeId
     */
    public function setInvoiceTypeId($invoiceTypeId)
    {
        $this->invoiceTypeId = $invoiceTypeId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignals()
    {
        return $this->signals;
    }

    /**
     * @return InvoiceItem
     * @param mixed $signals
     */
    public function setSignals($signals)
    {
        $this->signals = $signals;
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
     * @return InvoiceItem
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * @return InvoiceItem
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }
}
