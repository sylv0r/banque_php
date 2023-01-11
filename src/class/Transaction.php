<?php

class Transaction {
    public $id;
    public $amount;
    public $created_by;
    public $created_at;
    public $from_currency;
    public $to_currency;
    public $transaction_type;
    public $approved;
    public $approved_date;
    public $approved_by;

    public static function create($amount, $created_by, $from_currency, $to_currency, $transaction_type){
        $trasnsaction = new Transaction();
        $trasnsaction->amount = $amount;
        $trasnsaction->created_by = $created_by;
        $trasnsaction->from_currency = $from_currency;
        $trasnsaction->to_currency = $to_currency;
        $trasnsaction->transaction_type = $transaction_type;
        return $trasnsaction;
    }
}