<?php
namespace Src\Routing;

class RouteCollector
{
    private $routeParser;
    private $dataGenerator;

    /**
     * Constructs a route collector.
     *
     * @param RouteParser $routeParser
     * @param DataGenerator $dataGenerator
     */
    public function __construct(RouteParser $routeParser, DataGenerator $dataGenerator)
    {
        $this->routeParser = $routeParser;
        $this->dataGenerator = $dataGenerator;
    }

    /**
     * Adds a route to the collection.
     *
     * The syntax used in the $route string depends on the used route parser.
     *
     * @param string|string[] $httpMethod
     * @param string $route
     * @param mixed $handler
     * @param mixed $middleware
     */
    public function addRoute($httpMethod, $route, $handler, $middleware)
    {
        $routeDatas = $this->routeParser->parse($route);
        foreach ((array)$httpMethod as $method) {
            foreach ($routeDatas as $routeData) {
                $this->dataGenerator->addRoute($method, $routeData, $handler, $middleware);
            }
        }
    }

    /**
     * Returns the collected route data, as provided by the data generator.
     *
     * @return array
     */
    public function getData()
    {
        return $this->dataGenerator->getData();
    }
}
