<?php
   include_once "connect.php";
   
   
   if(isset($_GET['id'])){
   
     $id = $_GET['id'];
     
     if (is_numeric($id)){
        
        $sql = "delete from Usuarios where ID=$id";
        
        $delete = mysqli_query($conn,$sql);
        
        if ($delete){
                
                echo "<script>alert('Usuário deletado com sucesso!');</script>";
                
        }else{
           echo "<script>alert('Erro ao deletar usuário!');</script>";
        }
    
     }
     
     
     
   }
   
   mysqli_close($conn);
   
   echo "<script>window.location.href='usuarios.php'</script>";






?>