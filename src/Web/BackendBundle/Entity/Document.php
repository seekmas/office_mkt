<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Document
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
     * @ORM\Column(name="chinese_name", type="string", length=255)
     */
    private $chineseName;

    /**
     * @var string
     *
     * @ORM\Column(name="english_name", type="string", length=255)
     */
    private $englishName;

    /**
     * @var string
     *
     * @ORM\Column(name="id_card", type="string", length=255)
     */
    private $idCard;

    /**
     * @var string
     *
     * @ORM\Column(name="home_town", type="string", length=255)
     */
    private $homeTown;

    /**
     * @var string
     *
     * @ORM\Column(name="live_address", type="string", length=255)
     */
    private $liveAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=255)
     */
    private $phoneNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="mobile_number", type="bigint")
     */
    private $mobileNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="private_email", type="string", length=255)
     */
    private $privateEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="company_email", type="string", length=255)
     */
    private $companyEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_account", type="string", length=255)
     */
    private $bankAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_info", type="string", length=255)
     */
    private $bankInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity="User" , inversedBy="document")
     * @ORM\JoinColumn(name="user_id" , referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(name="user_id" , type="integer")
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity="Attachment" , mappedBy="document")
     * @ORM\OrderBy({"createdAt" = "DESC"})
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
     * Set chineseName
     *
     * @param string $chineseName
     * @return Document
     */
    public function setChineseName($chineseName)
    {
        $this->chineseName = $chineseName;

        return $this;
    }

    /**
     * Get chineseName
     *
     * @return string 
     */
    public function getChineseName()
    {
        return $this->chineseName;
    }

    /**
     * Set englishName
     *
     * @param string $englishName
     * @return Document
     */
    public function setEnglishName($englishName)
    {
        $this->englishName = $englishName;

        return $this;
    }

    /**
     * Get englishName
     *
     * @return string 
     */
    public function getEnglishName()
    {
        return $this->englishName;
    }

    /**
     * Set idCard
     *
     * @param string $idCard
     * @return Document
     */
    public function setIdCard($idCard)
    {
        $this->idCard = $idCard;

        return $this;
    }

    /**
     * Get idCard
     *
     * @return string 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set homeTown
     *
     * @param string $homeTown
     * @return Document
     */
    public function setHomeTown($homeTown)
    {
        $this->homeTown = $homeTown;

        return $this;
    }

    /**
     * Get homeTown
     *
     * @return string 
     */
    public function getHomeTown()
    {
        return $this->homeTown;
    }

    /**
     * Set liveAddress
     *
     * @param string $liveAddress
     * @return Document
     */
    public function setLiveAddress($liveAddress)
    {
        $this->liveAddress = $liveAddress;

        return $this;
    }

    /**
     * Get liveAddress
     *
     * @return string 
     */
    public function getLiveAddress()
    {
        return $this->liveAddress;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Document
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set mobileNumber
     *
     * @param integer $mobileNumber
     * @return Document
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return integer 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set privateEmail
     *
     * @param string $privateEmail
     * @return Document
     */
    public function setPrivateEmail($privateEmail)
    {
        $this->privateEmail = $privateEmail;

        return $this;
    }

    /**
     * Get privateEmail
     *
     * @return string 
     */
    public function getPrivateEmail()
    {
        return $this->privateEmail;
    }

    /**
     * Set companyEmail
     *
     * @param string $companyEmail
     * @return Document
     */
    public function setCompanyEmail($companyEmail)
    {
        $this->companyEmail = $companyEmail;

        return $this;
    }

    /**
     * Get companyEmail
     *
     * @return string 
     */
    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }

    /**
     * Set bankAccount
     *
     * @param string $bankAccount
     * @return Document
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * Get bankAccount
     *
     * @return string 
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Set bankInfo
     *
     * @param string $bankInfo
     * @return Document
     */
    public function setBankInfo($bankInfo)
    {
        $this->bankInfo = $bankInfo;

        return $this;
    }

    /**
     * Get bankInfo
     *
     * @return string 
     */
    public function getBankInfo()
    {
        return $this->bankInfo;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Document
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Document
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Document
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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return Document
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
     * @return Document
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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
     * @return Document
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
        return $this;
    }
}
