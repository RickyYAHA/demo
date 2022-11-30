<?php

use Steampixel\Route;

require_once('conf.php');
require_once('class/User.class.php');



Route::add('/', function() {
    echo "Głowna Strona";
});

Route::run('/demo');


?>