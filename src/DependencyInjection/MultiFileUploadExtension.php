<?php

declare(strict_types=1);

/*
 * This file is part of MultiFileUploadBundle.
 *
 * (c) Thomas Voggenreiter
 *
 * @license LGPL-3.0-or-later
 */

namespace Xirdion\MultiFileUploadBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class MultiFileUploadExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        try {
            $loader->load('listener.yml');
            $loader->load('services.yml');
        } catch (\Exception $e) {
        }
    }
}
