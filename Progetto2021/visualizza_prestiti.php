<?php
include "util.php";
include "connessione.php";


$id_utente = $_SESSION["id"];


$data_inizio = date("Y/m/d");
$data_fine = date('Y-m-d', strtotime($data_inizio . ' + 20 days'));
$id_prestito = "";


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
        <form method="post" action="elimina.php" >
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
                                echo "<td>".$id_prestito."</td>";
                                echo '<td><input type="checkbox" name="check[]" id="check" value='.$id_prestito.'></td>';
                                echo ' <td><input class="form-control" style="background-color: #d9d9d9;" readonly type="text"value= "' . $row["titolo"] . '" ></td>';
                                echo '<td><input class="form-control" style="background-color: #d9d9d9;" readonly type="text" value="' . $row["data_inizio"] . '" /></td>';
                                echo ' <td><input class="form-control" style="background-color: #d9d9d9" readonly type="text" value="' . $row["data_fine"] . '" /></td>';
                                echo '<td><input id="pulsante1" type="submit" value="Elimina Utenti"></td>' ;
                                

                                echo "</tr>";
                            }
                        }
                        $conn->close();

                        ?>


                    </tbody>
                </table>
                </form>
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