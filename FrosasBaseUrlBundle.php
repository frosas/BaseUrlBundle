<?php

namespace Frosas\BaseUrlBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Guzzle\Http\Url;

class FrosasBaseUrlBundle extends Bundle
{
    function boot()
    {
        $this->setRouterBaseUrl($this->container->getParameter('frosas_base_url.base_url'));
    }

    private function setRouterBaseUrl($baseUrl)
    {
        $baseUrl = Url::factory($baseUrl);
        $context = $this->container->get('router')->getContext();
        $context->setScheme($baseUrl->getScheme());
        $context->setHost($baseUrl->getHost());
        if ($baseUrl->getScheme() == 'http') $context->setHttpPort($baseUrl->getPort());
        if ($baseUrl->getScheme() == 'https') $context->setHttpsPort($baseUrl->getPort());
        $context->setBaseUrl(rtrim($baseUrl->getPath(), '/'));
    }
}