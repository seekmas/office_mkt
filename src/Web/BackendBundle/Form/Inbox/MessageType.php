<?php

namespace Web\BackendBundle\Form\Inbox;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user' , 'entity' , ['class' => 'Web\BackendBundle\Entity\User'])
            ->add('subject' , 'text')
            ->add('body' , 'textarea')
        ;

        $builder->add('submit' , 'submit');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'Inbox_message_form';
    }

}