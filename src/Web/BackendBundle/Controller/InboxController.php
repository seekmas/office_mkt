<?php

namespace Web\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Web\BackendBundle\Form\Inbox\MessageType;
use Web\BackendBundle\Form\Inbox\ReplyType;

class InboxController extends Controller
{
    public function indexAction()
    {
        $provider = $this->container->get('fos_message.provider');

        $threads = $provider->getInboxThreads();

        return $this->render('WebBackendBundle:Inbox:index/index.html.twig' , ['threads' => $threads]);

    }

    public function messageAction(Request $request , $id)
    {

        $manager = $this->get('fos_message.message_manager');

        $provider = $this->container->get('fos_message.provider');
        $thread = $provider->getThread($id);
        $participants = $thread->getParticipants();

        $manager->markIsReadByThreadAndParticipant($thread , $this->getUser() ,true);

        if($participants[0] == $this->getUser() || $participants[1] == $this->getUser())
        {
            $replyForm = $this->createForm(new ReplyType());
            $replyForm->handleRequest($request);
            if($replyForm->isValid())
            {
                $data = $replyForm->getData();
                $composer = $this->container->get('fos_message.composer');
                $message = $composer->reply($thread)
                    ->setSender($this->getUser())
                    ->setBody($data['body'])
                    ->getMessage();
                $sender = $this->container->get('fos_message.sender');
                $sender->send($message);

                $this->flash('success' , 'Reply successfully ! ');
                return $this->redirect('inbox_message' , ['id'=>$id]);
            }

            return $this->render('WebBackendBundle:Inbox:message/index.html.twig' ,
                [
                    'thread'=>$thread ,
                    'replyForm' => $replyForm->createView() ,
                ]
            );

        }else
        {
            $this->flash('danger' , 'You have no access to this message ! ');
            return $this->render('inbox_read');
        }

    }

    public function sentAction(Request $request)
    {

    }

    public function sendAction(Request $request)
    {
        $form = $this->createForm(new MessageType());

        $form->handleRequest($request);
        if($form->isValid())
        {
            $data = $form->getData();
            $composer = $this->container->get('fos_message.composer');
            $message = $composer->newThread()
                ->setSender($this->getUser())
                ->addRecipient($data['user'])
                ->setSubject($data['subject'])
                ->setBody($data['body'])
                ->getMessage();
            $sender = $this->container->get('fos_message.sender');
            $sender->send($message);

            $this->flash('success' , 'You send a message to '.$data['user']->getUsername());
            return $this->redirect('inbox_send');
        }

        return $this->render('WebBackendBundle:Inbox:send/index.html.twig' ,
            [
                'form' => $form->createView() ,
            ]
        );
    }

}