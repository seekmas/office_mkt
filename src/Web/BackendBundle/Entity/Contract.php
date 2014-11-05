<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Contract
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contract
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
     * @ORM\ManyToOne(targetEntity="Client" , inversedBy="contract")
     * @ORM\JoinColumn(name="client_id" , referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\Column(name="client_id" , type="integer")
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="contract_no", type="string", length=255)
     */
    private $contractNo;

    /**
     * @var string
     *
     * @ORM\Column(name="project_name", type="string", length=255)
     */
    private $projectName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sign_at", type="string" , length=255)
     */
    private $signAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_at", type="string" , length=255)
     */
    private $startAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_at", type="string" , length=255)
     */
    private $endAt;

    /**
     * @var string
     *
     * @ORM\Column(name="payment", type="bigint" )
     */
    private $payment;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="text")
     */
    private $remark;

    /**
     * @ORM\ManyToOne(targetEntity="ContractStatus" , inversedBy="contract")
     * @ORM\JoinColumn(name="status" , referencedColumnName="id")
     */
    private $contractStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="contract")
     * @ORM\JoinTable(name="Contract_Consultant")
     **/
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Attachment" , mappedBy="contract")
     */
    private $attachment;

    /**
     * @ORM\OneToMany(targetEntity="InvoiceItem" , mappedBy="contract")
     */
    private $invoiceItem;


    public function __construct() {
        $this->user = new ArrayCollection();
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
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return Contract
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return Contract
     * @param mixed $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Set contractNo
     *
     * @param string $contractNo
     * @return Contract
     */
    public function setContractNo($contractNo)
    {
        $this->contractNo = $contractNo;

        return $this;
    }

    /**
     * Get contractNo
     *
     * @return string
     */
    public function getContractNo()
    {
        return $this->contractNo;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     * @return Contract
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set signAt
     *
     * @param \DateTime $signAt
     * @return Contract
     */
    public function setSignAt($signAt)
    {
        $this->signAt = $signAt;

        return $this;
    }

    /**
     * Get signAt
     *
     * @return \DateTime
     */
    public function getSignAt()
    {
        return $this->signAt;
    }

    /**
     * Set startAt
     *
     * @param \DateTime $startAt
     * @return Contract
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set endAt
     *
     * @param \DateTime $endAt
     * @return Contract
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Set payment
     *
     * @param string $payment
     * @return Contract
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * Get payment
     *
     * @return string
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Contract
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
     * @return mixed
     */
    public function getContractStatus()
    {
        return $this->contractStatus;
    }

    /**
     * @return Contract
     * @param mixed $contractStatus
     */
    public function setContractStatus($contractStatus)
    {
        $this->contractStatus = $contractStatus;
        return $this;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Contract
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contract
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
     * @return Contract
     * @param mixed $user
     */
    public function setUser($user)
    {

        foreach ($this->user as $u) {
            if($u == $user)
            {
                return ;
            }
        }

        $this->user[] = $user;
        return $this;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Contract
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
     * @return Contract
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
    public function getInvoiceItem()
    {
        return $this->invoiceItem;
    }

    /**
     * @return Contract
     * @param mixed $invoiceItem
     */
    public function setInvoiceItem($invoiceItem)
    {
        $this->invoiceItem = $invoiceItem;
        return $this;
    }
}
