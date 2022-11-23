<?php
class User {
    private $db;
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
    public function login() {
        $query = "SELECT * FROM user WHERE login = ? LIMIT 1";
        $preparedQuery = $this->db->prepare($query);
        $preparedQuery->bind_param('s', $this->login);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if(password_verify($this->password, $row['password'])) {
                $this->password = $row['password'];
                $this->firstname = $row['firstname'];
                $this->lastname = $row['lastname'];
            }
        }
        
    }
    public function logout() {
        $this->login = null;
        $this->password = null;
        $this->id = null;
        $this->firstname = null;
        $this->lastname = null;
    }
    public function register() : bool{
        $query = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?)";
        $preparedQuery = $this->db->prepare($query);
        $passwordHash = password_hash($this->password, PASSWORD_ARGON2I);
        if(!isset($this->firstname))
            $this->firstname = "";
        if(!isset($this->lastname))
            $this->lastname = "";
        $preparedQuery->bind_param('ssss', $this->login, 
                                            $passwordHash,
                                            $this->firstname, 
                                            $this->lastname);
     $result = $preparedQuery->execute();
    return $result;
    }


    public function setfirstname(string $firstname) {
        $this->firstname = $firstname;
    }
    public function setlastname(string $lastname) {
        $this->lastname = $lastname;
    }
    public function getName() : string {
        return $this->firstname . " " . $this->lastname;
    }
}




?>