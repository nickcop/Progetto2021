<?php

include "connessione.php";

$email = $_POST["email"];


if(!isset($_POST["email"])){
        header('Location: login.php');
    }


$psw=$_POST["password"];

$psw1=crypt($psw, 'CRYPT_MD5');
    

    $sql = 'SELECT id_tessera FROM utente WHERE email = "'.$email.'" AND psw =  "'.$psw1.'" ';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        echo "".$mail;
        $row = $result -> fetch_assoc();
        $_SESSION["id"] = $row["id_tessera"];
        header('Location: menu_privato.php');
    } else {
       header('Location: login.php');
    }

    $conn->close();
    
    ?>