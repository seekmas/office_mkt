<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace Web\BackendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    private $menu;
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $this->menu = $factory->createItem('root');

        $this
             ->createCategory()
             ->createHome()
             ->configCategory()
             ->createProperty()
        ;

        return $this->menu;
    }

    public function createCategory()
    {
        $menu = $this->menu;

        $menu->addChild('Start' , ['route'=>'' , 'i'=>'fa fa-home']);
        return $this;
    }

    public function createHome()
    {
        $menu = $this->menu;
        $menu->addChild('Home', ['route' => '' , 'i' => 'fa fa-home']);
        $menu['Home']->addChild('Clients', ['route' => 'web_contact_home' , 'i' => 'fa fa-home']);
        return $this;
    }

    public function configCategory()
    {
        $menu = $this->menu;

        $menu->addChild('Config' , ['route'=>'' , 'i'=>'fa fa-home']);
        return $this;
    }

    public function createProperty()
    {
        $menu = $this->menu;
        $menu->addChild('Property', ['route' => '' , 'i' => 'fa fa-home']);
        $menu['Property']->addChild('Position', ['route' => 'property_position' , 'i' => 'fa fa-home']);

        $menu['Property']->addChild('Stage', ['route' => 'stage_position' , 'i' => 'fa fa-home']);

        return $this;
    }

}