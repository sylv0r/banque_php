<?php

class BankAccountManager {
    private $db;
    function __construct($bdd){
        $this->db = $bdd;
    }

    function getAccountById($id) {
        $sql = "SELECT bank_account.id, bank_account.amount, bank_account.currency, currencies.currency_name, currencies.currency_value FROM bank_account INNER JOIN currencies ON bank_account.currency = currencies.id WHERE bank_account.user_id = ?";
        $stmh = $this->db->prepare($sql);
        $stmh->execute([$id]);
        $result = $stmh->fetchAll(PDO::FETCH_CLASS, "BankAccount");
        return $result;
    }

    function areFoundsEnough($bankAccount, $currency, $amount) {
        foreach ($bankAccount as $row) {
            if ($row->currency === $currency) {
                if ($row->amount >= $amount && $row->amount > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }    
}