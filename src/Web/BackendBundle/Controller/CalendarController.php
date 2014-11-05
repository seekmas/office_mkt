<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Calendar;
use Web\BackendBundle\Entity\CalendarColor;
use Web\BackendBundle\Form\CalendarType;

class CalendarController extends Controller
{
    public function indexAction(Request $request , $id = 0)
    {

        $user = $this->getUser();
        $calendar_color = $this->getUser()->getCalendarColor();
        $em = $this->getManager();

        if($calendar_color == NULL)
        {
            $color = $this->get('color.generator');

            $calendar_color = new CalendarColor();
            $calendar_color->setUser($user);
            $calendar_color->setColor($color->getColor());


            $em->persist($calendar_color);
            $em->flush();
        }

        if($id)
        {
            $calendar = $this->get('calendar_entity')->find($id);

            if($calendar->getCalendarColor()->getUser() != $this->getUser())
            {
                $this->flash('danger' , 'You have no permission to access this event ! ');
            }

        }else
        {
            $calendar = new Calendar();
        }

        $calendar->setCalendarColor($this->getUser()->getCalendarColor());
        $form = $this->getForm($calendar,new CalendarType() , $request);
        if($form->isValid())
        {
            $calendar->setCreatedAt(new \Datetime());

            $em->persist($calendar);
            $em->flush();
            if($id)
            {
                $this->flash('success' , 'A new event is updated ! ');
            }else
            {
                $this->flash('success' , 'A new event is created ! ');
            }

            return $this->redirect('calendar_home');
        }

        $allColors = $this->get('color_entity')->findAll();

        $allEvents = $this->get('calendar_entity')->findAll();

        return $this->render('WebBackendBundle:Calendar:index/index.html.twig',
            [
                'calendar' => $calendar ,
                'user' => $user ,
                'allColors' => $allColors ,
                'allEvents' => $allEvents ,
                'form' => $form->createView() ,
            ]
        );
    }

    public function colorRollAction()
    {
        $user = $this->getUser();
        $calendar_color = $this->getUser()->getCalendarColor();
        $em = $this->getManager();

        $calendar_color->setColor($this->get('color.generator')->getColor());
        $em->persist($calendar_color);
        $em->flush();

        $this->flash('success' , 'Your color is updated ! ');
        return $this->redirect('calendar_home');
    }

    public function deleteAction($id)
    {
        $em = $this->getManager();

        $event = $this->get('calendar_entity')->find($id);

        if($event->getCalendarColor()->getUser() == $this->getUser())
        {
            $em->remove($event);
            $em->flush();
            $this->flash('success' , 'You delete an event ! ');
        }
        else
        {
            $this->flash('danger' , 'You have no permission to access this event ! ');
        }

        return $this->redirect('calendar_home');
    }

    public function googleAction()
    {

    }
}