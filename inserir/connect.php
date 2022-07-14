<?php
      
       
       $host = "fdb30.awardspace.net";
       $db = "3632023_aula";
       $user = "3632023_aula";
       $password = "horsebelga2000";
       
       $conn = mysqli_connect($host, $user, $password, $db);
       
       
       if(!$conn){
               die("Falha ao conectar-se ao banco de dados<br>".mysqli_connect_error()."<br>");
       }
          
          

?>