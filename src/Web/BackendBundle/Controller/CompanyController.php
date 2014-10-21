<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Company;
use Web\BackendBundle\Form\CompanyType;

class CompanyController extends Controller
{
    public function indexAction(Request $request)
    {
        $company = new Company();
        $type = new CompanyType();
        $form = $this->getForm($company,$type,$request);

        $company->setCreatedBy($this->getUser());

        if($form->isValid())
        {
            if($exist = $this->get('company_entity')->findOneByName($company->getName()))
            {
                $this->flash('danger' , $company->getName().' 的公司信息已经被'.$exist->getCreatedBy()->getUsername().'于'.$exist->getCreatedAt()->format('Y-m-d H:i:s').'创建过了');
                return $this->redirect('web_company_home');
            }

            $company->setCreatedAt(new \Datetime());
            $em = $this->getManager();
            $em->persist($company);
            $em->flush();
        }

        return $this->render('WebBackendBundle:Company:index/index.html.twig' ,

            [
                'form' => $form->createView() ,
            ]
        );
    }
}