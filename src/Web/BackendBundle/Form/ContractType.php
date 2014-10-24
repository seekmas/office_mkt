<?php

namespace Web\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContractType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contractNo')
            ->add('client')
            ->add('projectName')
            ->add('signAt' , null , ['attr'=>['class'=>'form-control input-datepicker' , 'placeholder'  => 'yy/mm/dd' , 'data-date-format' => 'yy/mm/dd']])
            ->add('startAt', null , ['attr'=>['class'=>'form-control input-datepicker' , 'placeholder'  => 'yy/mm/dd' , 'data-date-format' => 'yy/mm/dd']])
            ->add('endAt', null , ['attr'=>['class'=>'form-control input-datepicker' , 'placeholder'  => 'yy/mm/dd' , 'data-date-format' => 'yy/mm/dd']])
            ->add('payment')
            ->add('remark')
            ->add('user')
            ->add('contractStatus')
        ;

        $builder->add('submit' , 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\BackendBundle\Entity\Contract'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_backendbundle_contract';
    }
}
