<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InvoiceType
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
     * @var string
     *
     * @ORM\Column(name="min_expense", type="decimal")
     */
    private $minExpense;

    /**
     * @var string
     *
     * @ORM\Column(name="max_expense", type="decimal")
     */
    private $maxExpense;

    /**
     * @ORM\OneToMany(targetEntity="InvoiceItem" , mappedBy="invoiceType")
     */
    private $invoiceItem;

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
     * @return InvoiceType
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
     * Set minExpense
     *
     * @param string $minExpense
     * @return InvoiceType
     */
    public function setMinExpense($minExpense)
    {
        $this->minExpense = $minExpense;

        return $this;
    }

    /**
     * Get minExpense
     *
     * @return string 
     */
    public function getMinExpense()
    {
        return $this->minExpense;
    }

    /**
     * Set maxExpense
     *
     * @param string $maxExpense
     * @return InvoiceType
     */
    public function setMaxExpense($maxExpense)
    {
        $this->maxExpense = $maxExpense;

        return $this;
    }

    /**
     * Get maxExpense
     *
     * @return string 
     */
    public function getMaxExpense()
    {
        return $this->maxExpense;
    }

    /**
     * @return mixed
     */
    public function getInvoiceItem()
    {
        return $this->invoiceItem;
    }

    /**
     * @return InvoiceType
     * @param mixed $invoiceItem
     */
    public function setInvoiceItem($invoiceItem)
    {
        $this->invoiceItem = $invoiceItem;
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
