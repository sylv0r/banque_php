<?php

class GetRetrait{
    private $db;

    function __construct($bdd){
        $this->db = $bdd;
    }

    public function getAmount($id){
        $stmh = $this->db->prepare('SELECT amount FROM bank_account WHERE user_id = :id');
        $stmh->execute([
            'id' => $id,
        ]);
        $cur = $stmh->fetchAll();
        return $cur;
    }
    public function take_retrait(){
        $stmh = $this->db->prepare('SELECT *, transactions.id as idd, users.email, currencies.currency_name FROM transactions INNER JOIN users ON users.id = transactions.created_by INNER JOIN currencies ON currencies.id = transactions.to_currency WHERE approved is NULL && transaction_type = "retrait" ORDER BY transactions.id DESC ');
        $stmh->execute();
        $donnees = $stmh->fetchAll(PDO::FETCH_CLASS, 'Transaction');
        return $donnees;
    }

    public function approved($id, $to_currency, $amount, $idtransaction){
        $stmh = $this -> db -> prepare('UPDATE `transactions` SET `approved`=1,`approved_date`= NOW(),`approved_by`= :sessione WHERE id = :id ;');
        $stmh->execute([
            'id' => $idtransaction,
            'sessione' => $_SESSION['user_id'],
        ]);



        $update_from = $this->db->prepare("UPDATE bank_account SET amount = amount - :amount WHERE user_id = :id AND currency = :cur ");
        $update_from->execute([
            'amount' => $amount,
            'id' => $id,
            'cur' => $to_currency
        ]);
    
    }

    public function desapproved($id){
        $stmh = $this -> db -> prepare('UPDATE `transactions` SET `approved`=0 WHERE id = :id ;');
        $stmh->execute([
            'id' => $id,
           
        ]);
    }
    
    public function save_retrait_form($retrait, $iduser, $idCur){

        $stmh = $this->db->prepare('INSERT INTO `transactions` (`id`, `amount`, `created_by`, `created_at`, `from_currency`,
                                    `to_currency`, `transaction_type`, `approved`, `approved_date`, `approved_by`)
                                    VALUES (NULL, :retrait , :iduser, CURRENT_TIMESTAMP, :idCur, :idCur , "retrait", NULL, NULL, NULL);');
        $stmh->execute([
            'retrait' => $retrait,
            'iduser' => $iduser,
            'idCur' => $idCur
        ]); 
    }

    /*public function getByID($id){
        $stmh = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmh->execute([$id]);
        $stmh->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmh->fetch();
        return $user;
    }*/

    /*public function save_contact_form($fullname, $phone, $email, $message){
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


       
        
        
  
    }*/
}