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

    public function get_currency_value_by_id($id) {
        $stmh = $this->db->prepare('SELECT currency_value FROM currencies WHERE id = ?');
        $stmh->execute([$id]);
        $result = $stmh->fetch();
        return $result["currency_value"];
    }
}