<?php

namespace Web\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InvoiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoiceId')
            ->add('userId')
            ->add('productName')
            ->add('productDescription')
            ->add('price')
            ->add('buyAt')
            ->add('method')
            ->add('address')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\BackendBundle\Entity\Invoice'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_backendbundle_invoice';
    }
}
