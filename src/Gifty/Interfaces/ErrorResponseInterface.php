<?php

namespace Gifty\Interfaces;

/**
 * Interface ErrorResponseInterface
 * @package Gifty\Interfaces
 * @author Tadas Juozapaitis <kasp3rito@gmail.com>
 */
interface ErrorResponseInterface
{
    /**
     * Explanation of possible values:
     * 980: Please provide valid user ID.
     * 985: Insufficient funds. User may be short on his account and/or exceeds his limits.
     * 990: Customer company account has not enough funds and/or exceeds its limits.
     * 995: Request must be signed and signature must be passed as ‘signature’ request
     * parameter
     * 1000: Request signature cannot be verified, possibly erroneously generated.
     * 1010: Check your customer_key
     * 1015: Check your customer_key
     * 1030: No product ID or it is invalid
     * 1050: Template with this ID cannot be found or it is not specified.
     * 1055: Wrong template type, possibly using email template with phone number as
     * recipient or something similar.
     * @return int
     */
    public function getErrorCode();

    /**
     * Error description. E.c. “Wrong key”
     * @return string
     */
    public function getErrorDescription();
}