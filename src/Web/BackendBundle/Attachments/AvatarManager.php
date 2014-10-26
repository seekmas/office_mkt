<?php

namespace Web\BackendBundle\Attachments;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Form;

class AvatarManager implements AttachmentsManagerInterface
{

    private $container;
    private $form;
    private $entity;
    private $fieldName;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @param Form $form
     * @param stdClass $entity
     * @param string $fieldName
     */
    public function bind(Form $form , $entity , $fieldName = 'file')
    {
        $this->form = $form;
        $this->entity = $entity;
        $this->fieldName = $fieldName;
    }

    public function save()
    {
        $method = 'get'.ucwords($this->fieldName);
        $file = $this->entity->$method();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $dir = 'avatar';
        $save_dir = $this->container->get('kernel')->getRootDir() . '/../web/'.$dir.'/'.$user->getId();
        $fileSystem = new Filesystem();
        if(false == $fileSystem->exists($save_dir))
        {
            $fileSystem->mkdir($save_dir);
        }
        $fileName = $user->getId().'.'.$file->guessExtension();

        $file->move($save_dir,$fileName);
        return $dir.'/'.$user->getId().'/'.$fileName;
    }
}