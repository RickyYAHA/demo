<?php
require('class/User.class.php');
echo "<pre>";
$db = new mysqli('localhost','root', '', 'loginform' );
$user = new User("jkowalski", "tajneHasło");
var_dump($user);


?>