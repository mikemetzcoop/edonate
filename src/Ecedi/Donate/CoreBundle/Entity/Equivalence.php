<?php

namespace Ecedi\Donate\CoreBundle\Entity;

/**
 * inmutable Entity, non persistent
 * Equivalence Equivalence de dons
 * id (serial) int(11)
 * amount int(11)
 * currency
 * label
 */
class  Equivalence
{
    private $amount;
    private $currency;
    private $label;
    private $default;

    /**
     * default
     *
     * @return boolean [description]
     */
    public function getDefault()
    {
        return $this->default;
    }

    public function isDefault()
    {
        return $this->default;
    }

    /**
     * [Description]
     *
     * @param Boolean $newdefautl [description]
     */
    private function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * amount
     *
     * @return integer amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * amount
     *
     * @param Integer $newamount Amount
     */
    private function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Currency
     *
     * @return string currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * currency
     *
     * @param String $newCurrency Currency
     */
    private function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * label (en label)
     *
     * @return string label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * label
     *
     * @param String $newlabel Label
     */
    private function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    public function __construct($amount, $label, $currency = 'EUR', $default = false)
    {
        $this->setAmount($amount);
        $this->setLabel($label);
        $this->setCurrency($currency);
        $this->setDefault($default);
    }
}
