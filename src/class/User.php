<?php

class User{
    public $id;
    public $email;
    public $password;
    public $role;
    public $created_at;
    public $last_ip;

    public static function create($email, $password, $ip, $role=1){
        $user = new User();
        $user->email = $email;
        $user->password = hash('sha256', $password);
        $user->last_ip = $ip;
        $user->role = $role;
        return $user;
    }
    public function verifyPassword($password){
        $hashPassword = hash('sha256', $password);
        return ($hashPassword === $this->password);
    }
    public function getCreatedAt(){
        $date = new DateTime($this->created_at);
        return $date->format('d/m/Y H:i:s');
    }
}