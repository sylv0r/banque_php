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

    public function get_currency_by_name($name) {
        $stmh = $this->db->prepare('SELECT id FROM currencies WHERE currency_name = ?');
        $stmh->execute([$name]);
        $stmh->setFetchMode(PDO::FETCH_CLASS, 'Currency');
        $result = $stmh->fetch();
        return $result;
    }

    public function insert(Currency $currency) {
        $sql = "INSERT INTO currencies(currency_name, currency_value) VALUES(?,?)";
        $stmh = $this->db->prepare($sql);
        $stmh->execute([$currency->currency_name, $currency->currency_value]);
    }
}