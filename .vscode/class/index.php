<?php
require('User.class.php');
echo "<pre>";
$db = new mysqli('localhost','root', '', 'loginform' );
$user = new User("jkowalski", "tajneHasło");
$user->login();
if($user->isAuth()) {
    echo "użytkownik zalogowany poprawnie";
} else {
    echo "Błąd logowania";
}
?>