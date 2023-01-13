<?php

class UserManager{
    private $db;

    function __construct($bdd){
        $this->db = $bdd;

    }

    public function insert(User $user){
        $stmh= $this -> db -> prepare('INSERT INTO users(email, password, role, last_ip) VALUES(?,?,?,?)');
        $stmh->execute([
            $user->email,
            $user->password,
            $user->role,
            $user->last_ip
        ]);

        return $this->db->lastInsertId();
    }

    public function update_role($id, $role){
        $stmh= $this -> db -> prepare('UPDATE `users` SET `role`=? WHERE id = ?');
        $stmh->execute([
            $role,
            $id
        ]);

    }

    public function getByEmail($email){
        $stmh = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $stmh->execute([$email]);
        $stmh->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmh->fetch();
        return $user;
    }

    public function getByID($id){
        $stmh = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmh->execute([$id]);
        $stmh->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmh->fetch();
        return $user;
    }

    public function getAllUsersExcept($id=0){
        $stmh = $this->db->prepare('SELECT DISTINCT * FROM users WHERE id != ?');
        $stmh->execute([$id]);
        $users = $stmh->fetchAll(PDO::FETCH_CLASS, 'User');
        return $users;
    }

    public function take_users(){
        $stmh = $this->db->prepare('SELECT DISTINCT * FROM users WHERE role = 1');
        $stmh->execute();
        $donnees = $stmh->fetchAll(PDO::FETCH_CLASS, 'User');
        return $donnees;
    }

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
        $donnees = $stmh->fetchAll(PDO::FETCH_CLASS, 'User');
        return $donnees;
    }*/
}