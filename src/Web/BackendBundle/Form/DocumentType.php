<?php

namespace Web\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('chineseName')
            ->add('englishName')
            ->add('idCard')
            ->add('homeTown')
            ->add('liveAddress')
            ->add('phoneNumber')
            ->add('mobileNumber')
            ->add('privateEmail')
            ->add('companyEmail')
            ->add('bankAccount')
            ->add('bankInfo')
            ->add('currency')
            ->add('language')
        ;

        $builder->add('submit','submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\BackendBundle\Entity\Document'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_backendbundle_document';
    }
}
