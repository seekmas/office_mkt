<?php

namespace Web\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvoiceItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoiceDate', 'genemu_jquerydate' , ['required'=>false,'widget' => 'single_text'])
            ->add('invoiceType', null ,['required'=>false])
            ->add('etc' , null , ['required'=>false])
            ->add('totalNumber' , null , ['required'=>false])
        ;

        $builder->add('save' , 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\BackendBundle\Entity\InvoiceItem'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_backendbundle_invoiceitem';
    }
}
