<?php

class TransactionManager{
    private $db;

    function __construct($bdd){
        $this->db = $bdd;

    }

    public function insert(Transaction $transaction){
        $sql = 'INSERT INTO transaction(amount, created_by, from_currency, to_currency, transaction_type) VALUES(?,?,?,?,?)';
        $stmh= $this -> db -> prepare($sql);
        $stmh->execute([
            $transaction->amount,
            $transaction->created_by,
            $transaction->from_currency,
            $transaction->to_currency,
            $transaction->transaction_type,
        ]);

        return $this->db->lastInsertId();
    }
}