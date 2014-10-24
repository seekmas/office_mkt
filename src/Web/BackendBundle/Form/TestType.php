<?php

namespace Web\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('time' , 'datetime')
        ;

        $builder->add('submit' , 'submit');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test_form';
    }
}
