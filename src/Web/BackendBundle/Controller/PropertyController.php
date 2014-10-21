<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Industry;
use Web\BackendBundle\Entity\Position;
use Web\BackendBundle\Entity\Stage;
use Web\BackendBundle\Form\IndustryType;
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

        $positions = $this->get('position_entity')->findAll();

        return $this->render('WebBackendBundle:Property:position/index.html.twig' ,
            [
                'form'=>$form->createView() ,
                'positions' => $positions
            ]
        );
    }

    public function stageAction(Request $request)
    {
        $stage = new Stage();

        $type = new StageType();

        $form = $this->getForm($stage,$type,$request);

        if($form->isValid())
        {
            $name = $stage->getName();
            $exist = $this->get('stage_entity')->findOneByName($name);
            if($exist)
            {
                $this->flash('danger' , $name.' is existed!');
                return $this->redirect('stage_position');
            }

            $em = $this->getManager();
            $em->persist($stage);
            $em->flush();

            $this->flash('success' , $name.' is created successful!');
            return $this->redirect('stage_position');
        }

        $stages = $this->get('stage_entity')->findAll();

        return $this->render('WebBackendBundle:Property:stage/index.html.twig' ,
            [
                'form'=>$form->createView() ,
                'stages' => $stages
            ]
        );
    }

    public function industryAction(Request $request)
    {
        $industry = new Industry();
        $type = new IndustryType();

        $form = $this->getForm($industry,$type,$request);

        if($form->isValid())
        {
            $em = $this->getManager();
            $em->persist($industry);
            $em->flush();

            $this->flash('success' , $industry->getName().'添加成功');
            return $this->redirect('property_industry');
        }

        $industries = $this->get('industry_entity')->findAll();

        return $this->render('WebBackendBundle:Property:industry/index.html.twig' ,
            [
                'form'=>$form->createView() ,
                'industries' => $industries
            ]
        );
    }

    public function tagAction(Request $request){}
}
