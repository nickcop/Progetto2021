
<html lang="it">
<!-- AIzaSyCk_7nhN3cc_e4Enak5eNBtlkVmEyB80cc -->

<?php

include "util.php";
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Biblioteca</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/menu_stile.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
    <!-- Navigation-->
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
                    <li class="nav-item"><a class="nav-link" href="profilo.php">Profilo</a></li>
                    <li class="nav-item"><a class="nav-link" href="visualizza_prestiti.php">Libri prenotati</a></li>
                    <li class="nav-item"><a class="nav-link" href="Registrati.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container">
        
            <div class="col-lg-3">
                <h1 class="my-4">TechnoBook</h1>
                <div class="list-group">
                    <p class="list-group-item" value="science-fiction"  onClick="visualizza('science-fiction')">Fantascienza</p>
                    <p class="list-group-item" value="horror"  onClick="visualizza('horror')">Horror</p>
                    <p class="list-group-item" value="historical"  onClick="visualizza('historical')">Storici</p>
                    <p class="list-group-item" value="biography"  onClick="visualizza('biography')">Biografia</p>
                    <p class="list-group-item" value="adventure"  onClick="visualizza('adventure')">Avventura</p>
                    <p class="list-group-item" value="action"  onClick="visualizza('action')">Azione</p>
                    <p class="list-group-item" value="cooking"  onClick="visualizza('cooking')">Cucina</p>
                    <p class="list-group-item" value="love"  onClick="visualizza('love')">Amore</p>
                    <p class="list-group-item" value="spy"  onClick="visualizza('spy')">Spionaggio</p>
                    <p class="list-group-item" value="thriller"  onClick="visualizza('thriller')">Giallo</p>
                 
                </div>
            </div>
            <div class="col-lg-9" id ="container">
     
             
            </div>
        
    </div>
    <!-- Footer-->s
    <footer class="py-5 bg-dark">

    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->


    <script src= "js/elenco.js">
</script>
<script src= "js/stampainiziale.js">
</script>

</body>









</html>