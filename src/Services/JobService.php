<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Services;

use GuzzleHttp\Exception\ClientException;
use SiteCheckerSDK\Dto\Job;

class JobService extends AbstractService
{
    public function create(int $websiteId, array $urls, string $sitemapUrl): Job
    {
        $requestData = [
            'websiteId' => $websiteId,
            'params' => [
                'urls' => $urls,
                'sitemapUrl' => $sitemapUrl,
            ]
        ];

        try {
            $apiResponse = $this->httpClient->post('/jobs', [
                'json' => $requestData,
                'headers' => $this->createAuthHeader(),
            ]);

            $apiResponseBody = $apiResponse->getBody()->getContents();
            $apiResponseBodyDecoded = json_decode($apiResponseBody, true);

            $job = new Job();
            $job->setId($apiResponseBodyDecoded['id'] ?? null)
                ->setUrlsCount($apiResponseBodyDecoded['urlsCount'] ?? 0)
                ->setUrlsCount(new \DateTime($apiResponseBodyDecoded['createDate']))
                ->setUrlsProcessed($apiResponseBodyDecoded['urlsProcessed'] ?? 0);

            return $job;

        } catch (ClientException $clientException) {
            throw $this->getExceptionFromClientException($clientException);
        }
    }

    public function get(int $jobId): Job
    {
        try {
            $apiResponse = $this->httpClient->get('/jobs/' . (string)$jobId, [
                'headers' => $this->createAuthHeader(),
            ]);

            $apiResponseBody = $apiResponse->getBody()->getContents();
            $apiResponseBodyDecoded = json_decode($apiResponseBody, true);

            $job = new Job();
            $job->setId($apiResponseBodyDecoded['id'] ?? null)
                ->setStatus($apiResponseBodyDecoded['status'])
                ->setUrlsCount($apiResponseBodyDecoded['urlsCount'] ?? 0)
                ->setCreateDate(new \DateTime($apiResponseBodyDecoded['createDate']))
                ->setUrlsProcessed($apiResponseBodyDecoded['urlsProcessed'] ?? 0);

            return $job;

        } catch (ClientException $clientException) {
            throw $this->getExceptionFromClientException($clientException);
        }
    }
}