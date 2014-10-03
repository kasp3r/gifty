<?php

namespace Gifty;

use Gifty\Interfaces\ErrorResponseInterface;

/**
 * Class ErrorResponse
 * @package Gifty
 * @author Tadas Juozapaitis <kasp3rito@gmail.com>
 */
class ErrorResponse implements ErrorResponseInterface
{
    /** @var int */
    private $errorCode;
    /** @var string */
    private $errorDescription;

    public function __construct(array $data)
    {
        $this
            ->setErrorCode($data['error_code'])
            ->setErrorDescription($data['error_description']);
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     * @return $this
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorDescription()
    {
        return $this->errorDescription;
    }

    /**
     * @param string $errorDescription
     * @return $this
     */
    public function setErrorDescription($errorDescription)
    {
        $this->errorDescription = $errorDescription;

        return $this;
    }
}