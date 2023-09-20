<?php

namespace CBW\QMessage;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

/**
 * Class QMessageBundle
 * @package CBW\QMessage
 */
final class QMessageBundle extends AbstractBundle
{
    /**
     * @param array $config
     * @param ContainerConfigurator $container
     * @param ContainerBuilder $builder
     */
    final public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder
    ): void {
        $container->import('../config/services.yaml');
    }
}