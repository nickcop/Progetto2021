<!DOCTYPE html>
<?php
//include "util.php";
include "connessione.php";
?>

<head>
  


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    function checkmail() {
      var email = document.getElementById("email").value;

      if (email) {
        //La funzione permette di effettuare una chiamata AJAX e di personalizzarla con molti parametri.
        $.ajax({
          type: 'post',
          url: 'checkdata.php',
          data: {
            email: email,
          },

          //una funzione che viene eseguita se la richiesta riesce 
          success: function(response) {
            $('#cambio').html(response); // questo metodo permette di inserire il contenuto di response in html e inserirlo dentro l’elemento selezionato
            if (response == "Mail registrata") {
              $("#cambio").css('color', '#0AC02A'); // si va a modificare la grafica del testo all'interno di cambio
              return true;
            } else {
              $("#cambio").css('color', '#FF0004');
              return false;
            }
          }
        });
      }

    }

    function showHidePsw() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>





<html>

<head>

 <title>Login Form</title>

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

                    <li class="nav-item"><a class="nav-link" href="Registrati.php">Non sei ancora registrato?</a></li>         

                </ul>
            </div>
        </div>
    </nav>



    <form class="box" method="post" action="sessione.php">

<h1>Login</h1>

<input type="text" name="email" id="email" onkeyup="checkmail();" placeholder="Username">

<p id="cambio"></p>

<input type="password" name="password" id="showHide"  placeholder="Password">

<input type="submit" name="log" value="Login">

</form>

</body>


</html>












  <!--
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/styles.css" rel="stylesheet" />
  
</head>

<body>



  <div style="height:100%;width:100%;display:inline-block">

    <div class="splitdiv" id="leftdiv">
      <div id="leftdivcard">
        <h1 style="padding-top:20px;text-align:center;color:#595959">Accedi</h1>
        <form method="post" action="sessione.php">
          <input type="email" name="email" id="email" onkeyup="checkmail();" placeholder="Email..." required>
          <p id="cambio"></p>

          <div class="prova">
            <input type="password" name="password" id="password" placeholder="Password..." required>
            <i class="fas fa-eye" id="showHide" onclick="showHidePsw()" aria-hidden="true"></i>
          </div>
          <div style="text-align:center">
            <input type="submit" id="leftbutton" class="ripple2" name="Invia" value="Invia" />
        </form>
      </div>
    </div>
  </div>

  <div class="splitdiv" id="rightdiv">
    <div id="rightdivcard">
      <h1 style="padding-top:20px;text-align:center;color:white">Sei nuovo?</h1>
      <p style="color:white;text-align:center">Vuoi prenotare i tuoi libri? Registrati!</p>
      <div style="text-align:center">
        <form method="post" action="Registrati.php">
          <input type="submit" id="rightbutton" class="ripple" name="Registrati" value="Registrati" />
        </form>
      </div>
    </div>
  </div>

 
  
</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</html>



-->