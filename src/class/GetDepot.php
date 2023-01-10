<?php

class GetDepot{
    private $db;

    function __construct($bdd){
        $this->db = $bdd;
    }

    /*public function insert(User $user){
        $stmh= $this -> db -> prepare('INSERT INTO users(email, password, role, last_ip) VALUES(?,?,?,?)');
        $stmh->execute([
            $user->email,
            $user->password, 
            $user->role, 
            $user->last_ip
           
        ]);

        return $this->db->lastInsertId();
    }*/
    public function getCurencyName(){
        $stmh = $this->db->prepare('SELECT id,currency_name FROM currencies');
        $stmh->execute();
        $cur = $stmh->fetchAll(PDO::FETCH_CLASS, 'Depot');
        return $cur;
    }
    public function take_depot(){
        $stmh = $this->db->prepare('SELECT * FROM transactions WHERE approved is NULL');
        $stmh->execute();
        $donnees = $stmh->fetchAll(PDO::FETCH_CLASS, 'Transaction');
        return $donnees;
    }

    public function approved($id){
        $stmh = $this -> db -> prepare('UPDATE `transactions` SET `approved`=1,`approved_date`= NOW(),`approved_by`= :sessione WHERE id = :id ;');
        $stmh->execute([
            'id' => $id,
            'sessione' => $_SESSION['user_id'],
        ]);
    }

    public function desapproved($id){
        $stmh = $this -> db -> prepare('UPDATE `transactions` SET `approved`=0 WHERE id = :id ;');
        $stmh->execute([
            'id' => $id,
           
        ]);
    }
    
    public function save_depot_form($depot, $iduser, $idCur){
        /*$stmh = $this->db->prepare('INSERT INTO contact_forms(fullname, phone, email, message) 
                                    VALUES(:fullname, :phone, :email, :message)');
        $stmh->execute([
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
        ]); */
        $stmh = $this->db->prepare('INSERT INTO `transactions` (`id`, `amount`, `created_by`, `created_at`, `from_currency`,
                                    `to_currency`, `transaction_type`, `approved`, `approved_date`, `approved_by`)
                                    VALUES (NULL, :depot , :iduser, CURRENT_TIMESTAMP, :idCur, :idCur , "depot", NULL, NULL, NULL);');
        $stmh->execute([
            'depot' => $depot,
            'iduser' => $iduser,
            'idCur' => $idCur
        ]); 
        var_dump($stmh);

        /*$stmh = $db->prepare('INSERT INTO `transactions` (`id`, `amount`, `created_by`, `created_at`, `from_currency`,
                     `to_currency`, `transaction_type`, `approved`, `approved_date`, `approved_by`)
                      VALUES (NULL, $depot , $_SESSION[user_id], CURRENT_TIMESTAMP, $id, $id , "depot", NULL, NULL, NULL);');
        $stmh->execute($_POST);*/
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