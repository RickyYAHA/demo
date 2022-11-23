<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
</head>
<body>
    <form action="" method="post">
        <label for="logininfo">Login:</label><br>
        <input type="text" name="login" id="logininfo"><br>
        <label for="passwordinfo">Hasło:</label><br>
        <input type="password" name="password" id="passwordinfo"><br>
        <input type="submit" value="Zaloguj">
    </form>
<?php
if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    require_once('conf.php');
    require_once('User.class.php');
    $user = new user($_REQUEST['login'], $_REQUEST['password']);
    if($user->login()) {
        echo "Użytkownik zalogowany pomyślnie: ".$user->getName();
    } else {
        echo "Zły login bądź hasło";
    }
}
?>    
</body>
</html>