<?php

namespace Thormeier\BreadcrumbBundle\Model;

/**
 * Single breadcrumb model
 */
class Breadcrumb implements BreadcrumbInterface
{
    /**
     * @var array
     */
    private $routeParameters;

    /**
     * @var array
     */
    private $labelParameters;

    /**
     * @param string $label
     * @param string $route
     * @param array  $routeParameters
     * @param array  $labelParameters
     */
    public function __construct(private $label, private $route, array $routeParameters = [], array $labelParameters = [])
    {
        $this->setRouteParameters($routeParameters);
        $this->setLabelParameters($labelParameters);
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param array $routeParameters
     *
     * @return $this
     */
    public function setRouteParameters(array $routeParameters)
    {
        $this->routeParameters = $routeParameters;

        return $this;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param array $labelParameters
     *
     * @return $this
     */
    public function setLabelParameters(array $labelParameters)
    {
        $this->labelParameters = $labelParameters;

        return $this;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function getRouteParameters()
    {
        return $this->routeParameters;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function getLabelParameters()
    {
        return $this->labelParameters;
    }
}
