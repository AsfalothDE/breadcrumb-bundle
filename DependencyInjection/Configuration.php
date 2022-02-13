<?php

namespace Thormeier\BreadcrumbBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * DI configuration
 *
 * @codeCoverageIgnore
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): \Symfony\Component\Config\Definition\Builder\TreeBuilder
    {
        $treeBuilder = new TreeBuilder('thormeier_breadcrumb');
        $rootNode = method_exists(TreeBuilder::class, 'getRootNode')
            ? $treeBuilder->getRootNode()
            : $treeBuilder->root('thormeier_breadcrumb');

        $rootNode
            ->children()
                ->scalarNode('template')->defaultValue('@ThormeierBreadcrumb/breadcrumbs.html.twig')->end()
                ->scalarNode('model_class')->defaultValue(\Thormeier\BreadcrumbBundle\Model\Breadcrumb::class)->end()
                ->scalarNode('collection_class')->defaultValue(\Thormeier\BreadcrumbBundle\Model\BreadcrumbCollection::class)->end()
                ->scalarNode('provider_service_id')->defaultValue('thormeier_breadcrumb.breadcrumb_provider.default')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
