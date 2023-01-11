<?php

class TransactionManager{
    private $db;

    function __construct($bdd){
        $this->db = $bdd;

    }

    public function insert(Transaction $transaction, $from_value, $to_value){
        $sql = 'INSERT INTO transactions(amount, created_by, recipient, from_currency, to_currency, transaction_type) VALUES(?,?,?,?,?,?)';
        $stmh= $this -> db -> prepare($sql);
        $stmh->execute([
            $transaction->amount,
            $transaction->created_by,
            $transaction->recipient,
            $transaction->from_currency,
            $transaction->to_currency,
            $transaction->transaction_type,
        ]);

        $this->transfer($transaction->created_by, $transaction->recipient, $transaction->amount, ["id"=>$transaction->from_currency,"value"=>$from_value], ["id"=>$transaction->to_currency,"value"=>$to_value]);
    }

    function transfer($from, $to, $amount, $from_currency, $to_currency) {
        $update_from = $this->db->prepare("UPDATE bank_account SET amount = amount - ? WHERE user_id = ? AND currency = ?");
        $update_from->execute([$amount, $from, $from_currency['id']]);
        $search_currency = $this->db->prepare("SELECT id FROM bank_account WHERE user_id = ? AND currency = ?");
        $search_currency->execute([$to, $to_currency["id"]]);
        $row_count = $search_currency->rowCount();
        $to_dollars = $amount / $from_currency["value"];
        $to_wanted = $to_dollars * $to_currency["value"];

        if ($row_count == 0) {
            $create_currency = $this->db->prepare("INSERT INTO bank_account(user_id, amount, currency) VALUES(?,?,?)");
            $create_currency->execute([$to, $to_wanted, $to_currency["id"]]);
        } else {
            $update_from = $this->db->prepare("UPDATE bank_account SET amount = amount + ? WHERE user_id = ? AND currency = ?");
            $update_from->execute([$to_wanted, $to, $to_currency["id"]]);
        }
    }
}