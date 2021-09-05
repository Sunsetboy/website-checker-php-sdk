<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use SiteCheckerSDK\Exception\AccessDeniedException;
use SiteCheckerSDK\Exception\NotFoundException;

class AbstractService
{
    /** @var Client $httpClient */
    protected $httpClient;

    /**
     * @var string
     */
    protected $apiKey = '';

    public function __construct(Client $httpClient, string $apiKey = '')
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    public function createAuthHeader(): array
    {
        return [
            'X-AUTH-TOKEN' => $this->apiKey,
        ];
    }

    public function getExceptionFromClientException(ClientException $clientException): \Exception
    {
        $errorMessage = json_decode($clientException->getResponse()->getBody()->getContents(), true)['message'];

        switch ($clientException->getCode()) {
            case 404:
                return new NotFoundException($errorMessage, 404);
            case 403:
                return new AccessDeniedException($errorMessage, 403);
            default:
                return $clientException;
        }
    }
}