<?php

namespace Web\BackendBundle\Form\Inbox;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ReplyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('body' , 'text' , ['label' => 'Reply To'])
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mailbox_reply';
    }
}
