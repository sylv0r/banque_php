<?php

class Currency {
    public $id;
    public $currency_name;
    public $currency_value;

    public static function create($name, $value){
        $currency = new Currency();
        $currency->currency_name = $name;
        $currency->currency_value = $value;
        return $currency;
    }
}