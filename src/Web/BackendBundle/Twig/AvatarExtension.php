<?php

namespace Web\BackendBundle\Twig;

class AvatarExtension extends \Twig_Extension
{

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return
            [
                'user_avatar' => new \Twig_Function_Method($this, 'user_avatar' , ['is_safe' => true])
            ];
    }

    public function user_avatar()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $avatar = $user->getAvatar();
        if($avatar)
            return $avatar ? '<img src="./'.$avatar->getAvatar.'" />' : '';
        else
            return ;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'twig_avatar_extension';
    }
}