<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Services;

use GuzzleHttp\Client;

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
}