<?php
require_once('conf.php');
require_once('User.class.php');

$user = new User('Kasper', 'haslo123');

if($user->register()) {
    echo "Zarejestrowano poprawnie";
} else {
    echo "Błąd rejestracji użytkownika";
}


if($user->login()) {
    echo "Zalogowano!";
} else {
    echo "Zły login bądź hasło";
}

?>