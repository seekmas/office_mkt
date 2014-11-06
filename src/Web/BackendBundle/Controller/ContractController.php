<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Contract;
use Web\BackendBundle\Form\ContractType;

class ContractController extends Controller
{
    public function indexAction(Request $request)
    {
        $contract = new Contract();

        $contract->setUser($this->getUser());
        $type = new ContractType();
        $form = $this->getForm($contract,$type,$request);
        if($form->isValid())
        {
            $contract->setCreatedAt( new \Datetime());
            $em = $this->getManager();
            $em->persist($contract);
            $em->flush();

            $this->flash('success' , 'A new contract is created ! ');
            return $this->redirect('contract_list');
        }

        return $this->render('WebBackendBundle:Contract:index/index.html.twig' ,
            [
                'form' => $form->createView() ,
            ]
        );
    }

    public function editAction(Request $request , $id = NULL)
    {

        $contract = $this->get('contract_entity')->find($id);


        $type = new ContractType();
        $form = $this->getForm($contract,$type,$request);
        if($form->isValid())
        {
            $contract->setUser($this->getUser());
            $contract->setCreatedAt( new \Datetime());
            $em = $this->getManager();
            $em->persist($contract);
            $em->flush();
            $this->flash('success' , 'A contract is updated ! ');
            return $this->redirect('contract_list');
        }

        return $this->render('WebBackendBundle:Contract:edit/index.html.twig' ,
            [
                'form' => $form->createView() ,
            ]
        );
    }

    public function listAction()
    {
        $user = $this->getUser();

        return $this->render('WebBackendBundle:Contract:list/index.html.twig' , ['user'=>$user]);
    }

}