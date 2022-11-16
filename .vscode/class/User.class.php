<?php
class User {
    private int $id;
    private string $login
    private string $passwordHash
    private string $firstname
    private string $lastname

    
    public function __construct(string $login, string $password)
    {
                $this->login = $login;
                $this->password_hash = password_hash($password, PASSWORD_ARGON21);
    }
    public function isAuth() : bool {

    }
    public function login(){
        global $db;
    }
    public function logout(){

    }
    public function register(){

    }

}



?>