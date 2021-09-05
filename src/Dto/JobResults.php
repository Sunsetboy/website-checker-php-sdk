<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Dto;

use SiteCheckerSDK\Dto\JobResults\Check;

class JobResults
{
    /** @var Check */
    private $check;

    /** @var array  */
    private $duplicates = [];

    /**
     * @return Check
     */
    public function getCheck(): Check
    {
        return $this->check;
    }

    /**
     * @param Check $check
     * @return JobResults
     */
    public function setCheck(Check $check): JobResults
    {
        $this->check = $check;
        return $this;
    }

    /**
     * @return array
     */
    public function getDuplicates(): array
    {
        return $this->duplicates;
    }

    /**
     * @param array $duplicates
     * @return JobResults
     */
    public function setDuplicates(array $duplicates): JobResults
    {
        $this->duplicates = $duplicates;
        return $this;
    }


}