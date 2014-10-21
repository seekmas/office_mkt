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
             ->createConnection()
             ->configCategory()
             ->createProperty()
        ;

        return $this->menu;
    }

    public function createCategory()
    {
        $menu = $this->menu;

        $menu->addChild('Start' , ['attributes' => ['icon'=>'fa fa-share-alt']]);
        return $this;
    }

    public function createHome()
    {
        $menu = $this->menu;
        $menu->addChild('Home', ['route' => 'web_backend_homepage' ,  'attributes'=> ['icon' => 'fa fa-home']]);
        return $this;
    }

    public function createConnection()
    {
        $menu = $this->menu;
        $menu->addChild('Connection', [ 'attributes' => ['icon' => 'fa fa-magnet']]);
        $menu['Connection']->addChild('Clients', ['route' => 'web_contact_home','attributes'=>['icon' => 'fa fa-users']]);
        $menu['Connection']->addChild('Company', ['route' => 'web_company_home' ,'attributes'=>['icon' => 'fa fa-globe']]);
        return $this;
    }

    public function configCategory()
    {
        $menu = $this->menu;

        $menu->addChild('Config' , ['route'=>'' , 'attributes' => ['icon' => 'fa fa-cog']]);
        return $this;
    }

    public function createProperty()
    {
        $menu = $this->menu;
        $menu->addChild('Property', ['route' => '']);
        $menu['Property']->addChild('Position', ['route' => 'property_position']);

        $menu['Property']->addChild('Stage', ['route' => 'property_stage']);

        $menu['Property']->addChild('Industry', ['route' => 'property_industry']);

        return $this;
    }

}