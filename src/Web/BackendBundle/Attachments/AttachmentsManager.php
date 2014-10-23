<?php

namespace Web\BackendBundle\Attachments;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use Web\BackendBundle\Entity\Attachment;

class AttachmentsManager implements AttachmentsManagerInterface
{
    private $container;
    private $filesystem;
    private $dir;
    private $save_dir;
    private $form;
    private $attachment;
    private $entity;

    public function __construct($container,$entity)
    {
        $this->container = $container;
        $this->entity = $entity;
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

        $this->attachment->setMime($file->getMimeType());

        $file->move($this->save_dir,$file->getClientOriginalName());

        $this->attachment->setFile($file->getClientOriginalName());
        $this->attachment->setPath($this->dir);
        $this->attachment->setCreatedAt(new \Datetime());
        $this->attachment->setUser($this->container->get('security.context')->getToken()->getUser());
        $this->attachment->setMd5(md5_file($this->save_dir.'/'.$file->getClientOriginalName()));
    }

    public function output($uuid)
    {
        $file = $this->entity->find($uuid);
        $location = $this->container->get('kernel')->getRootDir().'/../'.$file->getPath().'/'.$file->getFile();

        $filesystem = new Filesystem();
        $filesystem->touch($location);

        $headers = array(
            'Content-Type' => $file->getMime(),
            'Content-Disposition' => 'attachment; filename="'.$file->getFile().'"' ,

        );
        return new Response(file_get_contents($location), 200, $headers);
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