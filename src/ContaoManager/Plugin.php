<?php

declare(strict_types=1);

/*
 * This file is part of MultiFileUploadBundle.
 *
 * (c) Thomas Voggenreiter
 *
 * @license LGPL-3.0-or-later
 */

namespace Xirdion\MultiFileUploadBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouteCollection;
use Xirdion\MultiFileUploadBundle\MultiFileUploadBundle;

class Plugin implements BundlePluginInterface, RoutingPluginInterface
{
    /**
     * @param ParserInterface $parser
     *
     * @return array
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(MultiFileUploadBundle::class)->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }

    /**
     * @param LoaderResolverInterface $resolver
     * @param KernelInterface         $kernel
     *
     * @throws \Exception
     *
     * @return RouteCollection|null
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        return $resolver
            ->resolve(__DIR__ . '/../Resources/config/routes.yml')
            ->load(__DIR__ . '/../Resources/config/routes.yml')
            ;
    }
}
