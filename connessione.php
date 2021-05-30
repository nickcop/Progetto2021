<?php  

$host = "localhost";
 $username  = "root"; 
 $password = ""; 
 $DBNome = "progetto";  
 $conn = new mysqli($host, $username, $password, $DBNome);
 if($conn -> connect_errno){     
 header('Location: errore.php');    
 exit; 
} 
 ?>
}
