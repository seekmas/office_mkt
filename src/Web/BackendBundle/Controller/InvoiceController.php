<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Entity\Attachment;
use Web\BackendBundle\Entity\InvoiceItem;
use Web\BackendBundle\Form\AttachmentType;
use Web\BackendBundle\Form\InvoiceItemType;

class InvoiceController extends Controller
{
    public function indexAction($character = null)
    {

        $user = $this->getUser();

        return $this->render('WebBackendBundle:Invoice:index/index.html.twig' ,
            [
                'user' => $user ,
                'character' => $character ,
            ]
        );
    }

    public function projectAction($clientId)
    {
        //$client = $this->get('client_entity')->find($clientId);

        $user = $this->getUser();

        return $this->render('WebBackendBundle:Invoice:project/index.html.twig' ,
            [
                'user' => $user ,
                'clientId' => $clientId ,
            ]
        );
    }

    public function createInvoiceAction($contractId)
    {
        $contract = $this->get('contract_entity')->find($contractId);

        return $this->render('WebBackendBundle:Invoice:create/index.html.twig' ,
            [
                'contract' => $contract
            ]
        );
    }

    public function addAction(Request $request , $masterId)
    {

        $em = $this->getManager();

        $attachment = new Attachment();
        $form = $this->getForm($attachment,new AttachmentType(),$request);

        $contract = $this->get('contract_entity')->find($masterId);
        $invoiceItem = new InvoiceItem();

        $status = $this->get('invoice_status_entity')->find(1);

        $invoiceItem->setStatus($status);
        $invoiceItem->setUser($this->getUser());
        $invoiceItem->setContract($contract);


        if($form->isValid())
        {
            $invoiceItem->setCreatedAt(new \Datetime());
            $em->persist($invoiceItem);
            $em->flush();

            $em->persist($attachment);
            $attachment_manager = $this->get('attachment.manager');
            $attachment_manager->bind($form,$attachment);
            $attachment_manager->save();

            $attachment->setInvoiceItem($invoiceItem);
            $em->flush();

            $this->flash('success' , 'Finish details of invoice please');

            return $this->redirect('finish_invoice_info' ,
                [
                    'invoiceId' => $invoiceItem->getId() ,
                    'contract' => $contract ,
                ]
            );
        }

        return $this->render('WebBackendBundle:Invoice:add/index.html.twig' ,
            [
                'form' => $form->createView() ,
                'contract' => $contract ,
            ]
        );
    }

    /**
     *  Finish a invoice's information
     */
    public function finishAction(Request $request , $invoiceId)
    {
        $em = $this->getManager();

        $item = $this->get('invoice_entity')->find($invoiceId);
        $form = $this->getForm($item,new InvoiceItemType(),$request);
        $signal = $this->getUser()->getDocument()->getEnglishName();
        $signal = $this->get('char.converter')->getShrot($signal) . $this->getUser()->getId();
        $signal = $signal.$item->getId();

        $item->setSignals($signal);

        if($form->isValid())
        {
            $status = $this->get('invoice_status_entity')->find(1);
            if($item->getStatus() == $status)
            {
                $em->persist($item);
                $em->flush();
                $this->flash('success' , 'An invoice\'s information is updated ! ');
                return $this->redirect('add_invoice_for_project' , ['contractId' => $item->getContract()->getId()]);
            }else
            {
                $this->flash('danger' , 'An invoice is in process / expired ! ');
                return $this->redirect('add_invoice_for_project' , ['contractId' => $item->getContract()->getId()]);
            }


        }

        $attachment = new Attachment();
        $attachment->setInvoiceItem($item);
        $uploadForm = $this->getForm($attachment,new AttachmentType() , $request);
        if($uploadForm->isValid())
        {

            $em->persist($attachment);
            $attachment_manager = $this->get('attachment.manager');
            $attachment_manager->bind($uploadForm,$attachment);
            $attachment_manager->save();


            $em->flush();

            $this->flash('success' , 'An invoice\'s photo is updated ! ');
            return $this->redirect('add_invoice_for_project' , ['contractId' => $item->getContract()->getId()]);
        }

        return $this->render('WebBackendBundle:Invoice:finish/index.html.twig' ,
            [
                'signal' => $signal ,
                'form'=>$form->createView() ,
                'uploadForm' => $uploadForm->createView() ,
                'item' => $item ,
            ]
        );
    }

    /**
     *  Delete the attachment of a invoice
     */
    public function deleteAction($invoiceId ,$attachmentId)
    {
        $invoice = $this->get('invoice_entity')->find($invoiceId);

        $attachment = $this->get('attachment_entity')->find($attachmentId);

        if($attachment->getInvoiceItem() != $invoice)
        {
            $this->flash('danger' , 'Attachment not found ! ');
            return $this->redirect('finish_invoice_info' , ['invoiceId' => $invoiceId]);
        }

        if($invoice->getUser()->getId() == $this->getUser()->getId())
        {

            $this->get('attachment.manager')->remove($attachment);
            $em = $this->getManager();
            $em->remove($attachment);
            $em->flush();
            $this->flash('success' , 'Attachment is deleted ! ');
            return $this->redirect('finish_invoice_info' , ['invoiceId' => $invoiceId]);
        }else
        {
            $this->flash('danger' , 'Attachment not found ! ');
            return $this->redirect('finish_invoice_info' , ['invoiceId' => $invoiceId]);
        }

    }
}