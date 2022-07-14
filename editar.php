<?php
     include_once "connect.php";
     
     if(isset($_GET['id'])){
       
       $id = $_GET['id'];
       
       $select = "select * from Usuarios where id=$id";
       
       $query = mysqli_query($conn,$select);
       
       
       
       
       
     
       if(mysqli_num_rows($query)==0){
               mysqli_close($conn);
               echo "<script>window.location.href = 'usuarios.php';</script>";
       }else{
       
               $dados = mysqli_fetch_array($query);
       
               $nomeAtual = $dados['Nome'];
               $nickAtual = $dados['Nick'];
               $cpfAtual =  $dados['CPF'];
       }
     
    
     
     }else{
         mysqli_close($conn);
         echo "<script>window.location.href = 'usuarios.php';</script>";
     }
     
     
     
     
     
     if (isset($_POST['nome'])){
             $nome = $_POST['nome'];
             $nick = $_POST['nick'];
             $cpf = $_POST['cpf'];
             
             $cpf = (string) $cpf;
             
             if (!is_numeric($cpf) || strlen($cpf)!=11){
                  echo "<script>alert('Digite um cpf válido!');</script>";   
             }else if(!ctype_alpha($nome) && !strpos($nome," ")){
                  echo "<script>alert('O nome deve ser alfabético!');</script>"; 
                  
                  
             }else if(strlen($nome)>40 || strlen($nick)>20){ 
                  echo "<script>alert('Nome deve ter até 40 caracteres e o Nick 20');</script>"; 
             }else{
             
                 $sql = "update Usuarios set Nick='%s',Nome='%s',CPF=$cpf where id=$id";
                 
                 $sql = sprintf($sql,$nick,$nome);
                 
                 $command = mysqli_query($conn,$sql);
                 
                 
                 if ($command==1){
                     echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
                     mysqli_close($conn);
                     echo "<script>window.location.href='usuarios.php'</script>";
                 }else{
                      echo "<script>alert('Houve um erro ao atualizar cadastro!');</script>"; 
                 }
                 
                 
                 
                 
             }
             
            
     
     
     }
     
     mysqli_close($conn);
     
          
?>

<html>

<head>

        <link href="styles/style.css" rel="stylesheet">

</head>

<body>

<h1>Atualizando cadastro</h1>


<form method="post">
    <label>ID</label> <input type="text" name="id" value = "<?php echo $id; ?>" disabled><br>
    <label>Nome</label> <input type="text" name="nome" value = "<?php echo $nomeAtual; ?>" required><br>
    <label>Nickname</label><input type="text" name="nick" value = "<?php echo $nickAtual; ?>" required><br>
    <label>CPF </label><input type="number" name="cpf" value = "<?php echo $cpfAtual; ?>" required><br>
    <button type="submit">Salvar</button>
    <a class="form" href="usuarios.php">&larr; Voltar</a>
</form>



</body>
