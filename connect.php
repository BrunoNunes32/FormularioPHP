<?php
      
       
       $host = "";
       $db = "";
       $user = "";
       $password = "";
       
       $conn = mysqli_connect($host, $user, $password, $db);
       
       
       if(!$conn){
               die("Falha ao conectar-se ao banco de dados<br>".mysqli_connect_error()."<br>");
       }
          
          

?>