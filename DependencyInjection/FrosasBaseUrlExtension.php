<?php

namespace Frosas\BaseUrlBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class FrosasBaseUrlExtension extends Extension
{
    function load(array $configs, ContainerBuilder $container)
    {
        $config = array();
        foreach ($configs as $userConfig) $config = $userConfig + $config;

        if (! isset($config['base_url'])) throw new \Exception("frosas_base_url.base_url not provided");

        $container->setParameter('frosas_base_url.base_url', $config['base_url']);
    }
}
