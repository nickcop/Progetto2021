
<?php
//include "util.php";
include "connessione.php";
?>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css%22%3E">

    <html>

    <head>

        <link rel="stylesheet" href="css/stile_login.css">
        <link rel="stylesheet" href="css/styles.css">

    </head>

<body>
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


    <form class="box" method="post" action="insert.php">

        <h1>Registrati</h1>

        <input type="text" name="email" id="email" placeholder="Email">

        <p id="cambio"></p>

        <input type="password" name="password" id="showHide" placeholder="Password">
            
        <i class="fas fa-eye" id="showHide"  aria-hidden="true"></i>

        <input type="text" name="Nome" id="Nome" placeholder="Nome">

        <input type="text" name="Cognome" id="Cognome" placeholder="Cognome">

        <input type="submit" name="regi" value="Registrati">

    </form>


</body>


</html>








