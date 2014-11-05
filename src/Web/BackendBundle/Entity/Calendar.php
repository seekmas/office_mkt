<?php

namespace Web\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calendar
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Calendar
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime" , nullable=true)
     */
    private $end;

    /**
     * @var boolean
     *
     * @ORM\Column(name="all_day", type="boolean" , nullable=true)
     */
    private $allDay;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255 , nullable=true)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="CalendarColor" , inversedBy="calendar")
     * @ORM\JoinColumn(name="calendar_color_id" , referencedColumnName="id")
     */
    private $calendarColor;

    /**
     * @ORM\Column(name="calendar_color_id" , type="integer")
     */
    private $calendarColorId;


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
     * Set title
     *
     * @param string $title
     * @return Calendar
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Calendar
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Calendar
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set allDay
     *
     * @param boolean $allDay
     * @return Calendar
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * Get allDay
     *
     * @return boolean 
     */
    public function getAllDay()
    {
        return $this->allDay;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Calendar
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Calendar
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
    public function getCalendarColor()
    {
        return $this->calendarColor;
    }

    /**
     * @return Calendar
     * @param mixed $calendarColor
     */
    public function setCalendarColor($calendarColor)
    {
        $this->calendarColor = $calendarColor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalendarColorId()
    {
        return $this->calendarColorId;
    }

    /**
     * @return Calendar
     * @param mixed $calendarColorId
     */
    public function setCalendarColorId($calendarColorId)
    {
        $this->calendarColorId = $calendarColorId;
        return $this;
    }
}
