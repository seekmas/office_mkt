<?php

namespace Web\BackendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    private $menu;

    private $container;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory , $container)
    {
        $this->factory = $factory;
        $this->container = $container;
    }

    public function createMainMenu(Request $request)
    {

        $security = $this->get('security.context');

        $this->menu = $this->factory->createItem('root');

        if( $security->isGranted('ROLE_USER'))
        {
            $this
                ->createCategory()
                ->createHome()
                ->createFileSharing()
            ;

        }elseif( $security->isGranted('ROLE_ADMIN'))
        {
            $this
                ->createCategory()
                ->createHome()
                ->createFileSharing()
                ->createInbox()
                ->createUser()
                ->createMarketing()
                ->configCategory()
                ->createProperty()
            ;
        }


        return $this->menu;
    }

    public function createCategory()
    {
        $menu = $this->menu;

        $menu->addChild('Business' , ['attributes' => ['icon'=>'fa fa-share-alt']]);
        return $this;
    }

    public function createHome()
    {
        $menu = $this->menu;
        $menu->addChild('Home', ['route' => 'web_backend_homepage' ,  'attributes'=> ['icon' => 'fa fa-home']]);
        return $this;
    }

    public function createFileSharing()
    {
        $menu = $this->menu;
        $menu->addChild('File_Sharing', ['route' => 'sharing_home' , 'label'=>'File Sharing' , 'attributes'=> ['icon' => 'fa fa-file-o']]);
        return $this;
    }

    public function createInbox()
    {

        $menu = $this->menu;
        $menu->addChild('Inbox', ['route' => 'inbox_read' , 'label'=>'Message' , 'attributes'=> ['icon' => 'fa fa-comments-o']]);
        return $this;
    }

    public function createUser()
    {
        $menu = $this->menu;
        $menu->addChild('My_Dashboard', [ 'label' => 'My Dashboard' , 'route' => '' ,  'attributes'=> ['icon' => 'fa fa-file-code-o']]);

        $menu['My_Dashboard']->addChild('Profile' , ['route' => 'user_document' , 'attributes' => ['icon' => 'fa fa-file-word-o'] ]);
        $menu['My_Dashboard']->addChild('Account' , ['route' => 'user_contract' , 'attributes' => ['icon' => 'fa fa-paw'] ]);
        $menu['My_Dashboard']->addChild('Client' , ['route' => 'client_list' , 'attributes' => ['icon' => 'fa fa-paw'] ]);
        $menu['My_Dashboard']->addChild('Contract' , ['route' => 'contract_list' , 'attributes' => ['icon' => 'fa fa-paw'] ]);
        $menu['My_Dashboard']->addChild('Invoice' , ['route' => 'invoice_home' , 'attributes' => ['icon' => 'fa fa-paw'] ]);

        return $this;
    }

    public function createInvoice()
    {
        $menu = $this->menu;
        $menu->addChild('Invoice', [ 'label' => 'Invoice' , 'route' => '' ,  'attributes'=> ['icon' => 'fa fa-cny']]);

        $menu['Invoice']->addChild('Client' , ['route' => '' , 'attributes' => ['icon' => 'fa fa-users'] ]);
        $menu['Invoice']->addChild('Reimburse' , ['route' => '' , 'attributes' => ['icon' => 'fa fa-money'] ]);

        return $this;
    }

    public function createMarketing()
    {
        $menu = $this->menu;
        $menu->addChild('Marketing', [ 'attributes' => ['icon' => 'fa fa-usd']]);
        $menu['Marketing']->addChild('Projects', ['route' => 'web_project_home','attributes'=>['icon' => 'fa fa-coffee']]);
        $menu['Marketing']->addChild('Contacts', ['route' => 'contact_list','attributes'=>['icon' => 'fa fa-users']]);
        $menu['Marketing']->addChild('Companies', ['route' => 'web_company_home' ,'attributes'=>['icon' => 'fa fa-globe']]);
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
        $menu->addChild('Property', ['route' => '' , 'attributes' => ['icon' => 'fa fa-database']]);
        $menu['Property']->addChild('Position', ['route' => 'property_position', 'attributes' => ['icon'=>'fa fa-cube']]);
        $menu['Property']->addChild('Stage', ['route' => 'property_stage' , 'attributes' => ['icon'=>'fa fa-sitemap']]);
        $menu['Property']->addChild('Industry', ['route' => 'property_industry' , 'attributes' => ['icon' => 'fa fa-cubes']]);
        $menu['Property']->addChild('Status', ['route' => 'property_status' , 'attributes' => ['icon' => 'fa fa-cubes']]);



        return $this;
    }

    public function get($service)
    {
        return $this->container->get($service);
    }
}