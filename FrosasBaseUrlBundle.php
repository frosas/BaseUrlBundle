<?php

namespace Frosas\BaseUrlBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Routing\RequestContext;
use Zend\Uri\Http;

class FrosasBaseUrlBundle extends Bundle
{
    function boot()
    {
        $this->setRouterBaseUrl($this->container->getParameter('frosas_base_url.base_url'));
    }

    private function setRouterBaseUrl($baseUrl)
    {
        $baseUrl = new Http($baseUrl);
        /** @var $context RequestContext */
        $context = $this->container->get('router')->getContext();
        $context->setScheme($baseUrl->getScheme());
        $context->setHost($baseUrl->getHost());
        if ($baseUrl->getScheme() == 'http') $context->setHttpPort($baseUrl->getPort());
        if ($baseUrl->getScheme() == 'https') $context->setHttpsPort($baseUrl->getPort());
        $context->setBaseUrl(rtrim($baseUrl->getPath(), '/'));
    }
}