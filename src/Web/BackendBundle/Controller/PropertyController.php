<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Position;
use Web\BackendBundle\Entity\Stage;
use Web\BackendBundle\Form\PositionType;
use Web\BackendBundle\Form\StageType;

class PropertyController extends Controller
{
    public function positionAction(Request $request)
    {
        $position = new Position();

        $type = new PositionType();

        $form = $this->getForm($position,$type,$request);

        if($form->isValid())
        {
            $name = $position->getName();
            $exist = $this->get('position_entity')->findOneByName($name);
            if($exist)
            {
                $this->flash('danger' , $name.' is existed!');
                return $this->redirect('property_position');
            }

            $em = $this->getManager();
            $em->persist($position);
            $em->flush();

            $this->flash('success' , $name.' is created successful!');
            return $this->redirect('property_position');
        }

        return $this->render('WebBackendBundle:Property:position/index.html.twig' , ['form'=>$form->createView()]);
    }

    public function stageAction(Request $request)
    {
        $stage = new Stage();

        $type = new StageType();

        $form = $this->getForm($stage,$type,$request);

        if($form->isValid())
        {
            $name = $stage->getName();
            $exist = $this->get('position_entity')->findOneByName($name);
            if($exist)
            {
                $this->flash('danger' , $name.' is existed!');
                return $this->redirect('property_position');
            }

            $em = $this->getManager();
            $em->persist($stage);
            $em->flush();

            $this->flash('success' , $name.' is created successful!');
            return $this->redirect('property_position');
        }

        return $this->render('WebBackendBundle:Property:stage/index.html.twig' , ['form'=>$form->createView()]);
    }

    public function tagAction(Request $request){}
}
