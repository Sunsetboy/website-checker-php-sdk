<?php
declare(strict_types=1);

namespace SiteCheckerSDK\Dto\JobResults;


class PageCheckElementDto
{
    private $url;
    private $errorMessage;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return PageCheckElementDto
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     * @return PageCheckElementDto
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


}