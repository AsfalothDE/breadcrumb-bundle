<?php

namespace Thormeier\BreadcrumbBundle\DependencyInjection;

use Thormeier\BreadcrumbBundle\Model\Breadcrumb;
use Thormeier\BreadcrumbBundle\Model\BreadcrumbCollection;
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
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('thormeier_breadcrumb');
        $rootNode = method_exists(TreeBuilder::class, 'getRootNode')
            ? $treeBuilder->getRootNode()
            : $treeBuilder->root('thormeier_breadcrumb');

        $rootNode
            ->children()
                ->scalarNode('template')->defaultValue('@ThormeierBreadcrumb/breadcrumbs.html.twig')->end()
                ->scalarNode('model_class')->defaultValue(Breadcrumb::class)->end()
                ->scalarNode('collection_class')->defaultValue(BreadcrumbCollection::class)->end()
                ->scalarNode('provider_service_id')->defaultValue('thormeier_breadcrumb.breadcrumb_provider.default')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
