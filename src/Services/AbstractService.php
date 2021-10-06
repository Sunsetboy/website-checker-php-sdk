<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use SiteCheckerSDK\Exception\AccessDeniedException;
use SiteCheckerSDK\Exception\NotFoundException;
use SiteCheckerSDK\Exception\BadRequestException;

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
        $exceptionBodyContentDecoded = json_decode($clientException->getResponse()->getBody()->getContents(), true);

        $errorMessage = $exceptionBodyContentDecoded['message'] ?? '';
        $errors = $exceptionBodyContentDecoded['errors'] ?? [];

        switch ($clientException->getCode()) {
            case 404:
                return new NotFoundException($errorMessage, 404);
            case 403:
                return new AccessDeniedException($errorMessage, 403);
            case 400:
                return new BadRequestException(!empty($errors) ? json_encode($errors) : $errorMessage, 400);
            default:
                return $clientException;
        }
    }
}