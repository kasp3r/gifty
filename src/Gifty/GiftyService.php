<?php

namespace Gifty;

/**
 * http://gifty.lt/ api service
 * @package Gifty
 * @author Tadas Juozapaitis <kasp3rito@gmail.com>
 */
class GiftyService
{
    private $apiEndpoint = 'http://gifty.lt/api/1.0/';
    private $customerKey;
    private $customerSecret;
    private $userId;
    private $testing = false;

    public function __construct($customerKey, $customerSecret, $userId)
    {
        $this
            ->setCustomerKey($customerKey)
            ->setCustomerSecret($customerSecret)
            ->setUserId($userId);
    }

    /**
     * @return string
     */
    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string $apiEndpoint
     * @return $this
     */
    public function setApiEndpoint($apiEndpoint)
    {
        $this->apiEndpoint = $apiEndpoint;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * @param string $customerKey
     * @return $this
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerSecret()
    {
        return $this->customerSecret;
    }

    /**
     * @param string $customerSecret
     * @return $this
     */
    public function setCustomerSecret($customerSecret)
    {
        $this->customerSecret = $customerSecret;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isTesting()
    {
        return $this->testing;
    }

    /**
     * @param boolean $testing
     * @return $this
     */
    public function setTesting($testing)
    {
        $this->testing = $testing;

        return $this;
    }

    /**
     * @param int $productId
     * @return string
     */
    protected function generateSignature($productId)
    {
        return md5($this->getCustomerSecret() . $this->getCustomerKey() . $productId);
    }

    /**
     * @param string $method
     * @param array $parameters
     * @throws \Exception
     * @return Response
     */
    protected function callApi($method, array $parameters)
    {
        $parameters['user_id'] = $this->getUserId();
        $parameters['customer_key'] = $this->getCustomerKey();
        $parameters['signature'] = $this->generateSignature($parameters['product_id']);
        if ($this->isTesting()) {
            $parameters['testing'] = 1;
        }

        $response = file_get_contents($this->getApiEndpoint() . $method . '?' . http_build_query($parameters));
        if (false === $response) {
            throw new \Exception("Can't read from api endpoint");
        }

        return new Response($response);
    }

    /**
     * @param string $productId
     * @param string $templateId
     * @param string $recipient phone number (+370...) or email
     * @return Response
     */
    public function createGift($productId, $templateId, $recipient = null)
    {
        $parameters = [
            'product_id' => $productId,
            'template_id' => $templateId
        ];

        if (null !== $recipient) {
            $parameters['recipient'] = $recipient;
        }

        return $this->callApi('customers.create_gift', $parameters);
    }
}