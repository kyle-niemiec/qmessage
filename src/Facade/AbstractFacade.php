<?php

namespace CBW\QMessage\Facade;

use CBW\QMessage\DataObject\AbstractDataObject;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class AbstractFacade
 * @package CBW\QMessage\Facade
 */
abstract class AbstractFacade
{
    /**
     * Return the API URL for the facade to use.
     *
     * @return string The API URL
     */
    abstract protected static function apiUrl(): string;

    /**
     * Overridable function to return any headers to set for the request.
     *
     * @return array
     */
    protected function headers(): array
    {
        return [];
    }

    /**
     * Overridable function to return any options to set for the request.
     *
     * @return array
     */
    protected function requestOptions(): array
    {
        return [];
    }

    /**
     * Construct the facade with an HTTP client and serializer.
     *
     * @param HttpClientInterface $client
     * @param SerializerInterface $serializer
     */
    #[NoReturn]
    public function __construct(
        protected readonly HttpClientInterface $client,
        protected readonly SerializerInterface $serializer
    ) { }

    /**
     * Given a particular route, send the data.
     *
     * @param AbstractFacadeRoute $route
     * @param AbstractDataObject $dataObject
     *
     * @throws TransportExceptionInterface
     * @return Response
     */
    final public function send(
        AbstractFacadeRoute $route,
        AbstractDataObject $dataObject
    ): Response
    {
        $requestOptions = array_merge(
            $this->requestOptions(),
            [
                'body' => $dataObject->serialize($this->serializer),
                'headers' => array_merge(
                    $this->headers(),
                    [
                        'Content-Type' => 'application/json'
                    ]
                )
            ]
        );

        $response = $this->client->request(
            $route::method->name,
            $this->facadeUrl($route->path()),
            $requestOptions
        );
    }
    
    /**
     * Return a formatted URL for the HTTP client with a domain and a resource.
     * 
     * @param string $resource
     * 
     * @return string
     */
    final public function facadeUrl(string $resource): string
    {
        return sprintf(
            "%s%s",
            static::apiUrl(),
            $resource
        );
    }
}