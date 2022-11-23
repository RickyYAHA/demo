<?php
class user {
    private int $id;
    private string $login;
    private string $password;
    private string $firstname;
    private string $lastname;

    public function __construct(string $login, string $password)
    {
                $this->login = $login;
                $this->password = $password;
            global $db;
            $this->db = &$db;
    }
    public function isAuth() : bool {
        if(isset($this->id) && $this->id != null)
            return true;
        else
            return false;
    }
    public function login(){
             $query = "SELECT * FROM user WHERE login = ? LIMIT 1";
        $preparedQuery = $this->db->prepare($query);
        $preparedQuery->bind_param('s', $this->login);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        $row = $result->fetch_assoc();
        $passwordHash = $row['password'];
        if(password_verify($this->password, $passwordHash)) {
            $this->id = $row['Info'];
            $this->firstName = $row['firstName'];
            $this->lastName = $row['lastName'];
        
        }

}
    public function logout(){

    }
    public function register(){
        $query = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?)";
        $preparedQuery = $this->db->prepare($query);
        $password = password_Hash($this->password, PASSWORD_ARGON2I);
        if(!isset($this->firstName))
            $this->firstName = "";
        if(!isset($this->lastName))
            $this->lastName = "";
        $preparedQuery->bind_param('okokok', $this->login, 
                                            $password,
                                            $this->firstName, 
                                            $this->lastName);
        $preparedQuery->execute();
    }

}




?>