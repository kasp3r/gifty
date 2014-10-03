<?php

namespace Gifty\Interfaces;

/**
 * Interface SuccessResponseInterface
 * @package Gifty\Interfaces
 * @author Tadas Juozapaitis <kasp3rito@gmail.com>
 */
interface SuccessResponseInterface
{
    /**
     * Gift code. I.e.. „123456“.
     * @return int
     */
    public function getGiftCode();

    /**
     * Expiration time for gift code. I.e. „2013-12-31“.
     * @return string
     */
    public function getGiftValidTill();

    /**
     * Gift title. I.e. "Big cranberry donut from SuperDonuts".
     * @return string
     */
    public function getGiftName();

    /**
     * Gift description
     * @return string
     */
    public function getGiftDescription();

    /**
     * Gift conditions
     * @return string
     */
    public function getGiftConditions();

    /**
     * Gift price. I.e. "9.50".
     * @return float
     */
    public function getGiftPrice();

    /**
     * Currency of the gift price. I.e. "EUR"
     * @return string|null
     */
    public function getGiftCurrency();

    /**
     * Gift image. http://gifty.(lt|lv|ee)/image/i.{gift_image_id}.png
     * I.e., if gift_image_id = 111111 and country is Lithuania
     * Raw image: https://gifty.lt/image/i.111111.png
     * Resized image: https://gifty.lt/image/i.111111/w.100/h.100.png (w - max width, h - max height)
     * @return int
     */
    public function getGiftImageId();
}