<?php

namespace Web\BackendBundle\Form\Inbox;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Sender extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file' , 'file' , ['label' => 'Upload File'])
        ;

        $builder->add('submit' , 'submit');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mailbox_sender';
    }
}
