<?php

namespace App\Parser;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Api
{
    private HttpClientInterface $httpClient;

    public function __construct(
        HttpClientInterface    $httpClient,
    )
    {
        $this->httpClient = $httpClient;
    }

    public function request(): bool|string
    {
        try {
            $response = $this->httpClient->request('GET', 'https://expo.chikoroko.art/token/notifications-paginator/', [
                'body' => [],
                'proxy' => 'http://:@127.0.0.1:8888'
            ]);
            if (Response::HTTP_OK === $response->getStatusCode()) {
                return $response->getContent();
            }
        } catch (DecodingExceptionInterface|TransportExceptionInterface|ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface $e) {
            return false;
        }
        return false;
    }

}
