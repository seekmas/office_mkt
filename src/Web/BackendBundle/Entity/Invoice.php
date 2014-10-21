<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Invoice
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
     * @var integer
     *
     * @ORM\Column(name="invoice_id", type="integer")
     */
    private $invoiceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="product_description", type="string", length=255)
     */
    private $productDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="buy_at", type="datetime")
     */
    private $buyAt;

    /**
     * @var string
     *
     * @ORM\Column(name="method", type="string", length=255)
     */
    private $method;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;


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
     * Set invoiceId
     *
     * @param integer $invoiceId
     * @return Invoice
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * Get invoiceId
     *
     * @return integer 
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Invoice
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
     * Set productName
     *
     * @param string $productName
     * @return Invoice
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productDescription
     *
     * @param string $productDescription
     * @return Invoice
     */
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * Get productDescription
     *
     * @return string 
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Invoice
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set buyAt
     *
     * @param \DateTime $buyAt
     * @return Invoice
     */
    public function setBuyAt($buyAt)
    {
        $this->buyAt = $buyAt;

        return $this;
    }

    /**
     * Get buyAt
     *
     * @return \DateTime 
     */
    public function getBuyAt()
    {
        return $this->buyAt;
    }

    /**
     * Set method
     *
     * @param string $method
     * @return Invoice
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return string 
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Invoice
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
}
