<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceStatus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InvoiceStatus
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
     * @ORM\OneToMany(targetEntity="InvoiceItem" , mappedBy="invoiceStatus")
     */
    private $invoiceItem;

    /**
     * @ORM\Column(name="flag" , type="string" , length=64)
     */
    private $flag;

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
     * @return InvoiceStatus
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
     * @return mixed
     */
    public function getInvoiceItem()
    {
        return $this->invoiceItem;
    }

    /**
     * @return InvoiceStatus
     * @param mixed $invoiceItem
     */
    public function setInvoiceItem($invoiceItem)
    {
        $this->invoiceItem = $invoiceItem;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * @return InvoiceStatus
     * @param mixed $flag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
