<?php

namespace Web\BackendBundle\Attachments;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Form;
use Web\BackendBundle\Entity\Attachment;

class AttachmentsManager implements AttachmentsManagerInterface
{
    private $container;
    private $filesystem;
    private $dir;
    private $save_dir;
    private $form;
    private $attachment;

    public function __construct($container)
    {
        $this->container = $container;
        $this->filesystem = new Filesystem();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $this->save_dir = $this->container->get('kernel')->getRootDir() . '/../attachments/'.$user->getId().'_'.date('Y_m');
        $this->dir = 'attachments/'.$user->getId().'_'.date('Y_m');
        if($this->filesystem->exists($this->dir) == false)
        {
            $this->filesystem->mkdir($this->dir);
        }
    }

    public function bind(Form $form , Attachment $attachment)
    {
        $this->form = $form;
        $this->attachment = $attachment;
    }

    public function save()
    {
        if($this->form == NULL)
        {
            return false;
        }

        $data = $this->form->getData();
        $file = $data->getFile();

        $file->move($this->save_dir,$file->getClientOriginalName());

        $this->attachment->setFile($file->getClientOriginalName());
        $this->attachment->setPath($this->dir);
        $this->attachment->setMime($file->getMimeType());
        $this->attachment->setCreatedAt(new \Datetime());
        $this->attachment->setMd5(md5_file($this->save_dir.'/'.$file->getClientOriginalName()));
    }

    public function remove()
    {

    }

    public function copy()
    {

    }

    public function move()
    {

    }
}