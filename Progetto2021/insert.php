<html>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link href="css/menu_stile.css" rel="stylesheet" />
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: white;
        user-select: none;
      }
        h1 {
          color: black;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
          user-select: none;
        }
        p {
          color: black;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
          user-select: none;
        }
      i {
        color: black;
        font-size: 100px;
        line-height: 200px;
        user-select: none;
        margin-left:-15px;
      }
      .card {
        position: relative;
        top: 10%;
        background: white;
        padding: 60px;
        border-radius: 15%;
        box-shadow: 0px 7px 12px 1px rgba(0,0,0,0.61);
        display: inline-block;
        margin: 0 auto;
        height: 80%;
        user-select: none;
      }
    </style>





  <?php
  include 'connessione.php';

  $mail = $_POST["email"];

  $pass = $_POST["password"];
  $nome = $_POST["Nome"];
  $cognome = $_POST["Cognome"];

  $returnValue = crypt($pass, 'CRYPT_MD5');
  $sql = "INSERT INTO `utente` (`email`, `psw`, `nome`, `cognome`)";
  $sql .= "VALUES('$mail','$returnValue','$nome', '$cognome')";

  if ($conn->query($sql)) {

    $lid = mysqli_insert_id($conn);
  ?>

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

      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Registrazione effettuata!
        </h1> 
        <p>Adesso torna alla schermata di login per affetuare l'accesso!</p>

        <input type="submit" value="Torna al login" class = "bttn" style="border-radius:5%; background-color: black; border: none;color: white;padding: 2px 15px;text-align: center;text-decoration: none;font-size: 1rem;border-radius: 1rem;margin: auto;cursor: pointer;user-select: none; ">
      </div>
    </body>
</html>


  <?php
  } else {
    echo "Errore nell'inserimento:" . $conn->error . "\n";
  }


  ?>
</body>

</html>