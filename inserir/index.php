<?php
     include_once "connect.php";
     
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
                  echo "<script>alert('Nome --> Máximo de 40 caracteres\nNick --> Máximo de 20 caracteres!');</script>"; 
                  
             }else{
             
                 $sql = "insert into Usuarios (Nick,Nome,CPF) values ('%s','%s',$cpf)";
                 
                 $sql = sprintf($sql,$nick,$nome);
                 
                 $command = mysqli_query($conn,$sql);
                 
                 if ($command){
                     echo "<script>alert('Cadastro concluído com sucesso!');</script>"; 
                     $nick = "";
                     $nome = "";                    
                 }else{
                         echo "<script>alert('Houve um erro ao cadastrar!');</script>"; 
                 }
                 
                 
                 
                 
             }
             
            
     
     
     }
     
     mysqli_close($conn);
     
          
?>

<html>

<head>

        <link href="../styles/style.css" rel="stylesheet">

</head>

<body>

<h1>Somente cadastro de usuários</h1>


<form method="post">
    <label>Nome</label> <input type="text" name="nome" value = "<?php echo $nome; ?>" required><br>
    <label>Nickname</label><input type="text" name="nick" value = "<?php echo $nick; ?>" required><br>
    <label>CPF </label><input type="number" name="cpf" required><br>
    <button type="submit">Enviar</button>
</form>



</body>
