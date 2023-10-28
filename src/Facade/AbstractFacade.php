<?php

namespace CBW\QMessage\Facade;

use CBW\QMessage\DataObject\AbstractDataObject;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

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
    abstract protected function apiUrl(): string;

    /**
     * Overridable function to return any headers to set for the request.
     *
     * @param AbstractDataObject|null $dataObject
     *
     * @return array
     */
    protected function headers(AbstractDataObject $dataObject = null): array
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
     * Overridable function for child classes to access the data-object with.
     *
     * @param AbstractDataObject $dataObject
     * @param AbstractFacadeRoute $route
     *
     * @return AbstractDataObject
     */
    protected function preSend(
        AbstractDataObject $dataObject,
        AbstractFacadeRoute $route
    ): AbstractDataObject
    {
        return $dataObject;
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
     * @return ResponseInterface
     */
    final public function send(
        AbstractFacadeRoute $route,
        AbstractDataObject $dataObject
    ): ResponseInterface
    {
        $dataObject = $this->preSend($dataObject, $route);

        $requestOptions = array_merge(
            $this->requestOptions(),
            [
                'body' => $dataObject->serialize($this->serializer),
                'headers' => array_merge(
                    $this->headers($dataObject),
                    [
                        'Content-Type' => 'application/json'
                    ]
                )
            ]
        );

        $response = $this->client->request(
            method: $route::$method->name,
            url: $this->facadeUrl($route->path()),
            options: $requestOptions
        );

        return $response;
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
        $url = vsprintf(
            format: "%s%s",
            values: [
                static::apiUrl(),
                $resource
            ]
        );

        return $url;
    }
}