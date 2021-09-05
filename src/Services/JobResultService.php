<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Services;

use GuzzleHttp\Exception\ClientException;
use SiteCheckerSDK\Dto\Job;
use SiteCheckerSDK\Dto\JobResults;

class JobResultService extends AbstractService
{
    public function get(int $jobId): JobResults
    {
        try {
            $apiResponse = $this->httpClient->get('/job-results/' . (string)$jobId, [
                'headers' => $this->createAuthHeader(),
            ]);

            $apiResponseBody = $apiResponse->getBody()->getContents();
            $apiResponseBodyDecoded = json_decode($apiResponseBody, true);

            $jobResult = $this->fillJobResultsFromApiResponse($apiResponseBodyDecoded);

            return $jobResult;

        } catch (ClientException $clientException) {
            throw $this->getExceptionFromClientException($clientException);
        }
    }

    private function fillJobResultsFromApiResponse(array $apiResponseBodyDecoded) : JobResults
    {
        $jobResult = new JobResults();
        $check = new JobResults\Check();
        $duplicates = [];

        if (isset($apiResponseBodyDecoded['checks']['Title'])) {
            $titles = array_map(
                function(array $titleCheck) {
                    return (new JobResults\PageCheckElementDto())->setUrl($titleCheck['url'])
                        ->setErrorMessage($titleCheck['error_message']);
                },
                $apiResponseBodyDecoded['checks']['Title']
            );
            $check->setTitles($titles);
        }

        if (isset($apiResponseBodyDecoded['checks']['Description'])) {
            $descriptions = array_map(
                function(array $descriptionCheck) {
                    return (new JobResults\PageCheckElementDto())->setUrl($descriptionCheck['url'])
                        ->setErrorMessage($descriptionCheck['error_message']);
                },
                $apiResponseBodyDecoded['checks']['Description']
            );
            $check->setDescriptions($descriptions);
        }

        if (isset($apiResponseBodyDecoded['checks']['ResponseTime'])) {
            $responseTimes = array_map(
                function(array $responseTimeCheck) {
                    return (new JobResults\PageCheckElementDto())->setUrl($responseTimeCheck['url'])
                        ->setErrorMessage($responseTimeCheck['error_message']);
                },
                $apiResponseBodyDecoded['checks']['ResponseTime']
            );
            $check->setResponseTimes($responseTimes);
        }

        if (isset($apiResponseBodyDecoded['checks']['StatusCode'])) {
            $statusCodes = array_map(
                function(array $statusCodeCheck) {
                    return (new JobResults\PageCheckElementDto())->setUrl($statusCodeCheck['url'])
                        ->setErrorMessage($statusCodeCheck['error_message']);
                },
                $apiResponseBodyDecoded['checks']['StatusCode']
            );
            $check->setStatusCodes($statusCodes);
        }

        $jobResult->setCheck($check);

        if (isset($apiResponseBodyDecoded['duplicates']['title'])) {
            $titleDuplicates = array_map(
                function(string $titleValue, array $urls) {
                    return (new JobResults\PageDuplicateDto())->setUrls($urls)
                        ->setElementValue($titleValue);
                },
                array_keys($apiResponseBodyDecoded['duplicates']['title']),
                array_values($apiResponseBodyDecoded['duplicates']['title'])
            );
            $duplicates['title'] = $titleDuplicates;
        }

        if (isset($apiResponseBodyDecoded['duplicates']['description'])) {
            $descriptionDuplicates = array_map(
                function(string $descriptionValue, array $urls) {
                    return (new JobResults\PageDuplicateDto())->setUrls($urls)
                        ->setElementValue($descriptionValue);
                },
                array_keys($apiResponseBodyDecoded['duplicates']['description']),
                array_values($apiResponseBodyDecoded['duplicates']['description'])
            );
            $duplicates['description'] = $descriptionDuplicates;
        }

        $jobResult->setDuplicates($duplicates);

        return $jobResult;
    }
}