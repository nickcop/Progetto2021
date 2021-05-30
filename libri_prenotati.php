<?php
include "util.php";
include "connessione.php";


$id_utente = $_SESSION["id"];



$stringaAutoreUnita = $_GET['dbAutore'];
$stringaCategoriaUnita = $_GET['dbCategoria'];
$titolo = $_GET["dbTitolo"];

$numero_pagine = $_GET["dbPagine"];
$ISBN = $_GET["dbISBN"];
$data_inizio = date("Y/m/d");
$data_fine = date('Y-m-d', strtotime($data_inizio . ' + 20 days'));
$id_prestito = "";
$idCategoria = "";
$idAutore = "";
$cancella = "";


$numero_pagine = str_replace("Numero pagine:", " ", $numero_pagine);
$numero_pagine = trim($numero_pagine);


$titolo = str_replace("Titolo:", " ", $titolo);
$titolo = trim($titolo);



$ISBN = str_replace("ISBN:", " ", $ISBN);
$ISBN = trim($ISBN);


$autori = explode(",", $stringaAutoreUnita);
$categoria = explode(",", $stringaCategoriaUnita);

$autori[0] = str_replace("Autore:", " ", $autori[0]);
$categoria[0] = str_replace("Categoria:", " ", $categoria[0]);



for ($i = 0; $i < sizeof($autori); $i++) {

    $authors = json_encode($autori[$i]);

    $authors = trim($authors);
    
    if ($authors != "" && $authors != ' "" ') {

        $sqlAut = "INSERT INTO autore (nome_darte)
        SELECT * FROM (SELECT '". $authors ."') AS tmp
        WHERE NOT EXISTS (
        SELECT nome_darte FROM autore WHERE nome_darte = '". $authors ."'
        ) LIMIT 1;";

        $result = $conn->query($sqlAut);
    }

    $selAut = "SELECT id_autore FROM autore WHERE nome_darte = '" . $authors . "'LIMIT 1";
    $result = $conn->query($selAut);

    while ($row = $result->fetch_assoc()) {

        $idAutore = strval($row["id_autore"]);
    }
}




for ($i = 0; $i < sizeof($categoria); $i++) {

    $category = json_encode($categoria[$i]);

    $category = trim($category);

    if ($category != "" && $category != ' "" ') {

        $sqlCat = "INSERT INTO categoria (categoria.categoria)
        SELECT * FROM (SELECT '". $category ."') AS tmp
        WHERE NOT EXISTS (
        SELECT categoria.categoria FROM categoria WHERE categoria = '". $category ."'
        ) LIMIT 1;";

        $conn->query($sqlCat);
    }


    $selCat = "SELECT id_categoria FROM categoria WHERE categoria = '" . $category . "'LIMIT 1";
    $result = $conn->query($selCat);

    while ($row = $result->fetch_assoc()) {

        $idCategoria = strval($row["id_categoria"]);
    }
}




if ($ISBN != "") {




    $sql = "INSERT INTO libro(isbn, titolo, numero_pagine) VALUES ('" . $ISBN . "','" . $titolo . "','" . $numero_pagine . "');";
    $conn->query($sql);

    $sqlLibCat = "INSERT INTO libro_categoria(isbn, id_categoria) VALUES ('" . $ISBN . "','" . $idCategoria . "');";
    $conn->query($sqlLibCat);

    $sqlLibAut = "INSERT INTO libro_autori(id_autore, ISBN) VALUES ('" . $idAutore . "','" . $ISBN . "');";
    $conn->query($sqlLibAut);

    $sqlLibUt = "INSERT INTO prestito (id_utente, ISBN, data_inizio, data_fine)
    SELECT * FROM (SELECT '" . $id_utente . "','" . $ISBN . "','" . $data_inizio . "','" . $data_fine . "') AS tmp
    WHERE NOT EXISTS (
    SELECT ISBN FROM prestito WHERE ISBN = '". $ISBN ."'
    ) LIMIT 1;";

    $conn->query($sqlLibUt);
}









?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="menu_privato.php">TechnoBook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="menu_privato.php">
                        Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="profilo.php">Il mio profilo</a></li>
                <li class="nav-item"><a class="nav-link" href="visualizza_prestiti.php">Libri prenotati</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>

            </ul>
        </div>
    </div>
</nav>
<section class="jumbotron text-center" style="background-color: #999999 ">
    <div class="container">
        <h1 class="jumbotron-heading">Elenco prestiti in corso</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped" style="background-color: #bfbfbf">
                    <thead>
                        <tr>
                            <th scope="col">Libro</th>
                            <th scope="col">Inizio prestito</th>
                            <th scope="col">Fine prestito</th>
                            <th scope="col" class="text-center"></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php






                        $sqlFinal = "SELECT prestito.id, libro.titolo, prestito.data_inizio, prestito.data_fine
                        FROM libro 
                        INNER JOIN prestito 
                        ON libro.isbn = prestito.ISBN
                        WHERE id_utente = $id_utente";

                        $result = $conn->query($sqlFinal);
                        while ($row = $result->fetch_assoc()) {

                            $id_prestito = $row["id"];


                            if ($row["titolo"] != "") {

                                echo "<tr>";
                                echo ' <td><input class="form-control" style="background-color: #d9d9d9;" readonly type="text"value= "' . $row["titolo"] . '" ></td>';
                                echo '<td><input class="form-control" style="background-color: #d9d9d9;" readonly type="text" value="' . $row["data_inizio"] . '" /></td>';
                                echo ' <td><input class="form-control" style="background-color: #d9d9d9" readonly type="text" value="' . $row["data_fine"] . '" /></td>';
                                   

                                echo "</tr>";
                            }
                        }
                        
                        /*
                         $cercaMail = "SELECT email
                        FROM utente 
                        WHERE id_tessera = $id_utente";

                        $invio = "Grazie per aver scelto la nostra biblioteca! Le è stata mandata una mail al suo indirizzo di posta elettronica con i dati da portare in sede";
                        $nonInvio = "Si è verificato un problema con l'invio della mail";

                        $result = $conn->query($cercaMail);
                        while ($row = $result->fetch_assoc()) {


                            if(mail( $row["email"] ,"Informazioni prestito effettuato","Grazie per aver scelto TechnoBook per e per aver preso in prestito il libro $titolo in seguito trovera' il codice identificativo del suo prestito: $id_prestito ","From: TechnoBook@alice.it "))
                                echo "<script type='text/javascript'>alert('$invio');</script>";
                                else 
                                echo "<script type='text/javascript'>alert('$nonInvio');</script>";

                            }
                        
                        */


                       

                        $conn->close();


 




                        ?>




                    </tbody>
                </table>
            </div>
        </div>

        <div class="col mb-2">
            <div class="row">

            </div>
        </div>
    </div>
</div>


<footer class="text-light">
    <div class="container">



    </div>

</footer>