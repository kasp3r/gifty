<?php

namespace Gifty;

use Gifty\Interfaces\ResponseInterface;

/**
 * Class Response
 * @package Gifty
 * @author Tadas Juozapaitis <kasp3rito@gmail.com>
 */
class Response implements ResponseInterface
{
    /** @var bool */
    private $error;
    /** @var array */
    private $data;
    /** @var ErrorResponse|SuccessResponse */
    private $response;

    /**
     * @param string $response json encoded response
     * @throws \Exception
     */
    public function __construct($response)
    {
        $data = json_decode($response, true);

        if (null === $data) {
            throw new \Exception('Wrong response');
        }

        $this
            ->setData($data)
            ->setError('error' == $data['status'])
            ->setResponse($this->isError() ? new ErrorResponse($this->getData()) : new SuccessResponse($this->getData()));
    }

    /**
     * {@inheritdoc}
     */
    public function isError()
    {
        return $this->error;
    }

    /**
     * @param boolean $error
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param ErrorResponse|SuccessResponse $response
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }
}