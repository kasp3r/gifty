<?php

namespace Gifty;

use Gifty\Interfaces\SuccessResponseInterface;

/**
 * Class SuccessResponse
 * @package Gifty
 * @author Tadas Juozapaitis <kasp3rito@gmail.com>
 */
class SuccessResponse implements SuccessResponseInterface
{
    /** @var int */
    private $giftCode;
    /** @var string */
    private $giftValidTill;
    /** @var string */
    private $giftName;
    /** @var string */
    private $giftDescription;
    /** @var string */
    private $giftConditions;
    /** @var float */
    private $giftPrice;
    /** @var string */
    private $giftCurrency;
    /** @var int */
    private $giftImageId;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this
            ->setGiftCode($data['gift_code'])
            ->setGiftValidTill($data['gift_valid_till'])
            ->setGiftName($data['gift_name'])
            ->setGiftDescription($data['gift_description'])
            ->setGiftConditions($data['gift_conditions'])
            ->setGiftPrice($data['gift_price'])
            ->setGiftCurrency(isset($data['gift_currency']) ? $data['gift_currency'] : null)
            ->setGiftImageId($data['gift_image_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftCode()
    {
        return $this->giftCode;
    }

    /**
     * @param int $giftCode
     * @return $this
     */
    public function setGiftCode($giftCode)
    {
        $this->giftCode = $giftCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftValidTill()
    {
        return $this->giftValidTill;
    }

    /**
     * @param string $giftValidTill
     * @return $this
     */
    public function setGiftValidTill($giftValidTill)
    {
        $this->giftValidTill = $giftValidTill;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftName()
    {
        return $this->giftName;
    }

    /**
     * @param string $giftName
     * @return $this
     */
    public function setGiftName($giftName)
    {
        $this->giftName = $giftName;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftDescription()
    {
        return $this->giftDescription;
    }

    /**
     * @param string $giftDescription
     * @return $this
     */
    public function setGiftDescription($giftDescription)
    {
        $this->giftDescription = $giftDescription;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftConditions()
    {
        return $this->giftConditions;
    }

    /**
     * @param string $giftConditions
     * @return $this
     */
    public function setGiftConditions($giftConditions)
    {
        $this->giftConditions = $giftConditions;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftPrice()
    {
        return $this->giftPrice;
    }

    /**
     * @param float $giftPrice
     * @return $this
     */
    public function setGiftPrice($giftPrice)
    {
        $this->giftPrice = $giftPrice;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftCurrency()
    {
        return $this->giftCurrency;
    }

    /**
     * @param string|null $giftCurrency
     * @return $this
     */
    public function setGiftCurrency($giftCurrency)
    {
        $this->giftCurrency = $giftCurrency;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGiftImageId()
    {
        return $this->giftImageId;
    }

    /**
     * @param int $giftImageId
     * @return $this
     */
    public function setGiftImageId($giftImageId)
    {
        $this->giftImageId = $giftImageId;

        return $this;
    }
}