<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Dto\JobResults;


class Check
{
    /** @var PageCheckElementDto[] */
    private $titles = [];
    /** @var PageCheckElementDto[] */
    private $descriptions = [];
    /** @var PageCheckElementDto[] */
    private $responseTimes = [];
    /** @var PageCheckElementDto[] */
    private $statusCodes = [];

    /**
     * @return PageCheckElementDto[]
     */
    public function getTitles(): array
    {
        return $this->titles;
    }

    /**
     * @param PageCheckElementDto[] $titles
     * @return Check
     */
    public function setTitles(array $titles): Check
    {
        $this->titles = $titles;
        return $this;
    }

    /**
     * @return PageCheckElementDto[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param PageCheckElementDto[] $descriptions
     * @return Check
     */
    public function setDescriptions(array $descriptions): Check
    {
        $this->descriptions = $descriptions;
        return $this;
    }

    /**
     * @return PageCheckElementDto[]
     */
    public function getResponseTimes(): array
    {
        return $this->responseTimes;
    }

    /**
     * @param PageCheckElementDto[] $responseTimes
     * @return Check
     */
    public function setResponseTimes(array $responseTimes): Check
    {
        $this->responseTimes = $responseTimes;
        return $this;
    }

    /**
     * @return PageCheckElementDto[]
     */
    public function getStatusCodes(): array
    {
        return $this->statusCodes;
    }

    /**
     * @param PageCheckElementDto[] $statusCodes
     * @return Check
     */
    public function setStatusCodes(array $statusCodes): Check
    {
        $this->statusCodes = $statusCodes;
        return $this;
    }
}