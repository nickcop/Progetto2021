<!DOCTYPE html>
<html lang="it">
<!-- AIzaSyCk_7nhN3cc_e4Enak5eNBtlkVmEyB80cc -->


<style>



body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative;
  top:30px;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5%;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
 
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 5%;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}</style>

<?php


?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TechnoBook</title>
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
            <a class="navbar-brand" href="menu_pubblico.php">TechnoBook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="menu_pubblico.php">
                            Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>         
                      </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container">

        <div class="col-lg-3">
            <h1 class="my-4">TechnoBook</h1>
            <div class="list-group">
                <p class="list-group-item" value="science-fiction" onclick="visualizza('science-fiction')">Fantascienza</p>
                <p class="list-group-item" value="horror" onclick="visualizza('horror')">Horror</p>
                <p class="list-group-item" value="historical" onclick="visualizza('historical')">Storici</p>
                <p class="list-group-item" value="biography" onclick="visualizza('biography')">Biografia</p>
                <p class="list-group-item" value="adventure" onclick="visualizza('adventure')">Avventura</p>
                <p class="list-group-item" value="action" onclick="visualizza('action')">Azione</p>
                <p class="list-group-item" value="cooking" onclick="visualizza('cooking')">Cucina</p>
                <p class="list-group-item" value="love" onclick="visualizza('love')">Amore</p>
                <p class="list-group-item" value="spy" onclick="visualizza('spy')">Spionaggio</p>
                <p class="list-group-item" value="thriller" onclick="visualizza('thriller')">Giallo</p>

            </div>
        </div>
        <div class="col-lg-9" id="container">
       
        <div class="search">
            <input id="search-box" type="text" class="form-control" style="border: 3px solid #212529; " placeholder="Cerca i libri!">
            <button id="search" class="btn btn-primary" style=" background-color: #212529;   " onclick="visualizza(document.getElementById('search-box').value)">Search</button>

      
        </div>

        </div>

    </div>
    <!-- Footer-->s
    <footer class="py-5 bg-dark">
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->



    <script src="js/elenco_pubblico.js">
    </script>
    <script src="js/stampa_pubblica.js">
    </script>

</body>







</html>