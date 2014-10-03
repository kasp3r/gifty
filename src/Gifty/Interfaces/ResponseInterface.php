<?php

namespace Gifty\Interfaces;

/**
 * Interface ResponseInterface
 * @package Gifty\Interfaces
 * @author Tadas Juozapaitis <kasp3rito@gmail.com>
 */
interface ResponseInterface
{
    /**
     * Is error response
     * @return bool
     */
    public function isError();

    /**
     * Error or success response object
     * @return ErrorResponseInterface|SuccessResponseInterface
     */
    public function getResponse();
}