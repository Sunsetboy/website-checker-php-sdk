<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Dto;

class Job
{
    const STATUS_ACTIVE = 1; // in progress
    const STATUS_COMPLETE = 2; // complete

    private $id;
    private $websiteId;
    private $urlsCount;
    private $createDate;
    private $urlsProcessed;
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Job
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebsiteId()
    {
        return $this->websiteId;
    }

    /**
     * @param mixed $websiteId
     * @return Job
     */
    public function setWebsiteId($websiteId)
    {
        $this->websiteId = $websiteId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlsCount()
    {
        return $this->urlsCount;
    }

    /**
     * @param mixed $urlsCount
     * @return Job
     */
    public function setUrlsCount($urlsCount)
    {
        $this->urlsCount = $urlsCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param mixed $createDate
     * @return Job
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlsProcessed()
    {
        return $this->urlsProcessed;
    }

    /**
     * @param mixed $urlsProcessed
     * @return Job
     */
    public function setUrlsProcessed($urlsProcessed)
    {
        $this->urlsProcessed = $urlsProcessed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Job
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }


}