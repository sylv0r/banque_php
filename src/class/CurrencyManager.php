<?php 

class CurrencyManager {
    private $db;

    function __construct($bdd){
        $this->db = $bdd;
    }

    public function get_currencies() {
        $stmh = $this->db->query('SELECT id, currency_name, currency_value FROM currencies');
        $result = $stmh->fetchAll(PDO::FETCH_CLASS, 'Currency');
        return $result;
    }
}