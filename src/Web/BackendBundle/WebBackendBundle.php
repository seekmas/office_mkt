<?php

namespace Web\BackendBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Web\BackendBundle\DependencyInjection\CompilePass\FormTwigPass;

class WebBackendBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass( new FormTwigPass());
    }
}
