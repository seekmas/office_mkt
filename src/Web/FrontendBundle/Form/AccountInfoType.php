<?php

namespace Web\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject' , 'text' , ['required' => false , 'label' => '用途说明'])
            ->add('loginUrl' , 'text' , ['required' => false , 'label' => '登陆地址'])
            ->add('username' , 'text' , ['required' => false , 'label' => '用户名'])
            ->add('password' , 'text' , ['required' => false , 'label' => '密码'])
            ->add('passwordProtection' , 'textarea' , ['required' => false , 'label' => '密码保护'])
            ->add('description' , 'textarea' , ['required' => false , 'label' => '描述信息'])
            ->add('linkPhone' , 'text' , ['required' => false , 'label' => '关联手机'])
            ->add('linkEmail' , 'text' , ['required' => false , 'label' => '关联邮箱'])
        ;

        $builder->add('save' , 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\FrontendBundle\Entity\AccountInfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web_frontendbundle_accountinfo';
    }
}
