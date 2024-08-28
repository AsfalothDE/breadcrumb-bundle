<?php

namespace Thormeier\BreadcrumbBundle\Twig;

use Thormeier\BreadcrumbBundle\Provider\BreadcrumbProviderInterface;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\TwigFunction;
use Twig\Environment;
use Twig\Extension\AbstractExtension;

/**
 * Twig extension for breadcrumbs: Render a given template
 */
class BreadcrumbExtension extends AbstractExtension
{
    /**
     * @param BreadcrumbProviderInterface $breadcrumbProvider
     * @param string $template
     */
    public function __construct(private readonly BreadcrumbProviderInterface $breadcrumbProvider, private $template)
    {
    }

    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction(
            'breadcrumbs',
            $this->renderBreadcrumbs(...),
            [
                'needs_environment' => true,
                'is_safe' => ['html'],
            ],
        )];
    }

    /**
     * @param Environment $twigEnvironment
     *
     * @return string
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function renderBreadcrumbs(Environment $twigEnvironment)
    {
        return $twigEnvironment->render($this->template, [
            'breadcrumbs' => $this->breadcrumbProvider->getBreadcrumbs()->getAll(),
        ]);
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getName()
    {
        return 'thormeier.breadcrumb_bundle.twig_extension';
    }
}
