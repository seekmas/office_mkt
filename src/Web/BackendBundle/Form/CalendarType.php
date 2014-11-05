<?php

namespace Web\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CalendarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('start' , 'genemu_jquerydate' , ['widget' => 'single_text'])
            ->add('end' , 'genemu_jquerydate' , ['widget' => 'single_text'])
        ;

        $builder->add('Save Event' , 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\BackendBundle\Entity\Calendar'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_backend_bundle_calendar';
    }
}
