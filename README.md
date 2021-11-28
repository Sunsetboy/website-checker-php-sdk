# Website Checker PHP SDK

SDK for working with Check My Website service

## Requirements
* PHP 7.2+ with json extension

## Installation
```
composer require sunsetboy/sitechecker_sdk
```

## Quick start

```php
// init the SiteChecker
$siteChecker = new SiteChecker(
    'sitechecker_url',
    'your_api_key',
    10 // timeout in seconds, 10 by default
);

/* 
    Create a new job
*/
$websiteId = YOUR_WEBSITE_ID;
// urls to check, at least 1
$urls = [
    'http://www.example.com',
    'http://www.example.com/my-url',
];
$sitemapUrl = 'http://www.example.com/sitemap.xml'; // could be an empty string

$createdJobDto = $siteChecker->createJob($websiteId, $urls, $sitemapUrl);

/** @var \SiteCheckerSDK\Dto\Job $createdJobId */
$createdJobId = $createdJobDto->getId();

// now you can use this id to request your job results

/*
 * Get a job results
 */
/** @var \SiteCheckerSDK\Dto\Job $jobResult */ 
$jobResult = $siteChecker->getJob($createdJobId);
```

