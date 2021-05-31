<?php 
session_start();

if (!isset($_SESSION["id"])) {

    echo '<a href="login.php"></a>';
} else {
    echo '<a href="menu_privato.php"></a>';
}

?>