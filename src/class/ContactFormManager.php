<?php

class ContactFormManager{
    private $db;

    function __construct($bdd){
        $this->db = $bdd;
    }

    public function save_contact_form($fullname, $phone, $email, $message){
        $stmh = $this->db->prepare('INSERT INTO contact_forms(fullname, phone, email, message) VALUES(:fullname, :phone, :email, :message)');
        $stmh->execute([
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
        ]); 
    }

    public function take_form(){
        $stmh = $this->db->prepare('SELECT * FROM contact_forms');
        $stmh->execute();
        $donnees = $stmh->fetchAll(PDO::FETCH_CLASS, 'ContactForm');
        return $donnees;
    }
}