<?php

namespace Web\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SupplyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' , 'text' , ['label' => '公司名称' , 'required' => false ])
            ->add('personName' , 'text' , ['label' => '联系人姓名' , 'required' => false ])
            ->add('personPhone' , 'text' , ['label' => '联系人电话' , 'required' => false ])
            ->add('personDuty' , 'text' , ['label' => '联系人职务' , 'required' => false ])
            ->add('companyAddress' , 'text' , ['label' => '公司地址' , 'required' => false ])
            ->add('city' , 'text' , ['label' => '城市' , 'required' => false ])
            ->add('postcode' , 'text' , ['label' => '邮编' , 'required' => false ])
            ->add('country' , 'text' , ['label' => '国家地区' , 'required' => false ])
            ->add('fax' , 'text' , ['label' => '传真号码' , 'required' => false ])
            ->add('email' , 'text' , ['label' => '电子邮箱' , 'required' => false ])
            ->add('notes' , 'textarea' , ['label' => '备注' , 'required' => false ])
        ;

        $builder->add('save','submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\FrontendBundle\Entity\Supply'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_frontendbundle_supply';
    }
}
