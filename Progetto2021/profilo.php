<link href="css/styles.css" rel="stylesheet" />

<?php

include "connessione.php";
include "util.php";


        if(!isset($_SESSION["id"])){
            header('Location: login.php');
        };

        $id = $_SESSION["id"];
        $sql="SELECT * FROM utente WHERE id_tessera = $id";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
          echo "<table>";
          
        

          $e = $row['email'];
          
          $nome = $row['nome'];
          $cognome = $row['cognome'];
        }

        $conn->close();



        
  


?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="menu_privato.php">TechnoBook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="menu_privato.php">
                            Home
                            
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="profilo.php">Profilo<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="visualizza_prestiti.php">Libri prenotati</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>




    

  
      
        
        
          <div class="tab-content" style="background-color: white;">
            <div class="tab-pane fade active show" id="account-general">

            
              <hr class="border-light m-0">
<div class="navbar navbar-expand-lg " style="height: 20%;"  ><h1>Riepilogo dati</h1></div>
              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <div   type="text" disabled class="form-control mb-1"><?php echo $e ?></div>
                </div>
                <div class="form-group">
                  <label class="form-label">Cognome</label>
                  <div type="text" disabled class="form-control mb-1" ><?php echo $cognome?></div>
  
                </div>
                <div class="form-group">
                  <label class="form-label">Nome</label>
                  <div type="text" disabled class="form-control"><?php echo $nome?></div>
                </div>
              </div>

            </div>
           

              </div>
            
          
        
      
  

  </div>