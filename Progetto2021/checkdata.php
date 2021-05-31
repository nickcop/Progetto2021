<?php
include "connessione.php";
//include "util.php";



if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM utente WHERE email='$email'";

    $query = $conn->query($sql);

    if ($row = $query->fetch_assoc()) {
        echo "Mail registrata";
    } else {
        echo "Mail non registrata";
    }
    exit();
}
