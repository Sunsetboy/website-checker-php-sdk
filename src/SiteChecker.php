<?php
declare(strict_types=1);

namespace SiteCheckerSDK;

use GuzzleHttp\Client;
use SiteCheckerSDK\Dto\Job;
use SiteCheckerSDK\Dto\JobResults;
use SiteCheckerSDK\Dto\Website;
use SiteCheckerSDK\Services\JobResultService;
use SiteCheckerSDK\Services\JobService;
use SiteCheckerSDK\Services\UserService;
use SiteCheckerSDK\Services\WebsiteService;

/**
 * Testing using Docker:
 * If you run your website using Docker and the checker is using Docker also
 * (in different networks on a local machine) - to access the website use host
 * host.docker.internal:{PORT} to access the website from the checker
 */
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

    /** @var JobResultService  */
    private $jobResultService;

    public function __construct(string $baseUrl, string $apiKey, int $timeout = 10)
    {
        $this->httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' => $baseUrl,
            // You can set any number of default request options.
            'timeout' => $timeout,
        ]);
        $this->apiKey = $apiKey;
        $this->websiteService = new WebsiteService($this->httpClient, $this->apiKey);
        $this->jobService = new JobService($this->httpClient, $this->apiKey);
        $this->userService = new UserService($this->httpClient, $this->apiKey);
        $this->jobResultService = new JobResultService($this->httpClient, $this->apiKey);
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

    public function createJob(int $websiteId, array $urls, string $sitemapUrl): Job
    {
        return $this->jobService->create($websiteId, $urls, $sitemapUrl);
    }

    public function getJob(int $jobId): Job
    {
        return $this->jobService->get($jobId);
    }

    public function getJobResults(int $jobId): JobResults
    {
        return $this->jobResultService->get($jobId);
    }
}