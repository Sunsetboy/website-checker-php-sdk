<?php
declare(strict_types=1);

namespace SiteCheckerSDK;

use GuzzleHttp\Client;
use SiteCheckerSDK\Dto\Job;
use SiteCheckerSDK\Dto\JobResults;
use SiteCheckerSDK\Dto\Website;
use SiteCheckerSDK\Services\JobService;
use SiteCheckerSDK\Services\UserService;
use SiteCheckerSDK\Services\WebsiteService;

class SiteChecker
{
    /**
     * @var WebsiteService
     */
    private $websiteService;
    /**
     * @var JobService
     */
    private $jobService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(string $baseUrl, string $apiKey)
    {
        $this->httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' => $baseUrl,
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
        $this->apiKey = $apiKey;
        $this->websiteService = new WebsiteService($this->httpClient, $this->apiKey);
        $this->jobService = new JobService($this->httpClient, $this->apiKey);
        $this->userService = new UserService($this->httpClient, $this->apiKey);
    }

    public function getWebsite(int $websiteId): Website
    {

    }

    public function getWebsites(): array
    {

    }

    public function createWebsite(string $url): Website
    {

    }

    public function createJob(int $websiteId, array $urls): Job
    {

    }

    public function getJobResults(int $jobId): JobResults
    {

    }
}