<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Dto\JobResults;


class PageDuplicateDto
{
    private $elementValue;
    private $urls = [];

    /**
     * @return mixed
     */
    public function getElementValue()
    {
        return $this->elementValue;
    }

    /**
     * @param mixed $elementValue
     * @return PageDuplicateDto
     */
    public function setElementValue($elementValue)
    {
        $this->elementValue = $elementValue;
        return $this;
    }

    /**
     * @return array
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @param array $urls
     * @return PageDuplicateDto
     */
    public function setUrls(array $urls): PageDuplicateDto
    {
        $this->urls = $urls;
        return $this;
    }


}