<?php
 include 'connessione.php';
 $tab_nome = "prestiti";
if(isset($_POST['check']))
{
    foreach($_POST['check'] as  $x)
    {
        $sql = "DELETE FROM ".$tab_nome." WHERE ID = ".$x."" ;
        $conn->query($sql);
        header("location: visualizza_prestiti.php");
        
        
    }
}
?>