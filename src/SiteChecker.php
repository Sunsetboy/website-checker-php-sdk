<?php
declare(strict_types=1);

namespace SiteCheckerSDK;

use GuzzleHttp\Client;
use SiteCheckerSDK\Dto\Website;

class SiteChecker
{
    public function __construct(string $baseUrl, string $apiKey)
    {
        $this->httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' => $baseUrl,
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
        $this->apiKey = $apiKey;
    }

    public function getWebsite(int $websiteId):Website
    {

    }
}