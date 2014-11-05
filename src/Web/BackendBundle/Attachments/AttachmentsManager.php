<?php

namespace Web\BackendBundle\Attachments;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Web\BackendBundle\Entity\Attachment;

/**
 * Class AttachmentsManager
 * @package Web\BackendBundle\Attachments
 */
class AttachmentsManager implements AttachmentsManagerInterface
{
    /**
     * @var
     */
    private $container;
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var string
     */
    private $dir;
    /**
     * @var string
     */
    private $save_dir;
    /**
     * @var
     */
    private $form;
    /**
     * @var
     */
    private $attachment;
    /**
     * @var
     */
    private $entity;

    /**
     * @param $container
     * @param $entity
     */
    public function __construct($container,$entity)
    {
        $this->container = $container;
        $this->entity = $entity;
        $this->filesystem = new Filesystem();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $this->save_dir = $this->container->get('kernel')->getRootDir() . '/../web/attachments/'.$user->getId().'_'.date('Y_m');
        $this->dir = 'attachments/'.$user->getId().'_'.date('Y_m');
        if($this->filesystem->exists($this->dir) == false)
        {
            $this->filesystem->mkdir($this->dir);
        }
    }

    /**
     * @param Form $form
     * @param Attachment $attachment
     * @return NULL
     */
    public function bind(Form $form , Attachment $attachment)
    {
        $this->form = $form;
        $this->attachment = $attachment;
    }

    /**
     * @return NULL
     */
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

    /**
     * @param $uuid
     * @return Response
     */
    public function output($uuid)
    {
        $file = $this->entity->find($uuid);
        $location = $this->container->get('kernel')->getRootDir().'/../web/'.$file->getPath().'/'.$file->getFile();

        $filesystem = new Filesystem();
        $filesystem->touch($location);

        $headers = array(
            'Content-Type' => $file->getMime(),
            'Content-Disposition' => 'attachment; filename="'.$file->getFile().'"' ,
        );

        return new Response(file_get_contents($location), 200, $headers);
    }

    public function remove($attachment)
    {
        $filesystem = new Filesystem();
        $file = $this->container->get('kernel')->getRootDir() . DIRECTORY_SEPARATOR  .'..' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . $attachment->getPath() . DIRECTORY_SEPARATOR . $attachment->getFile();

        if($filesystem->exists($file))
        {
            $filesystem->remove($file);
        }
    }

    public function copy()
    {

    }

    public function move()
    {

    }
}