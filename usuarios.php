<head>

        <link href="styles/style.css" rel="stylesheet">

</head>

<?php
   include_once "connect.php";
   
   
   $sql = "select * from Usuarios";
   
   
   $select = mysqli_query($conn,$sql);
      
   
   
   if(mysqli_num_rows($select)==0){
   
           echo "<h1>Não há usuários cadastrados!</h1>";
   }else{
             
             
             print("<div class='usuarios'>");
             print("<table>
                      
                        <theader>
                             <th>ID</th>
                             <th>Nick</th>
                             <th>Nome</th>
                             <th>CPF</th>
                             <th></th>
                             <th></th>
                             
                        </theader>                 
                  ");
           
           
           while($linha = mysqli_fetch_array($select)){
                print("
                        <tr>
                             <td>$linha[0]</td>
                             <td>$linha[1]</td>
                             <td>$linha[2]</td>
                             <td>$linha[3]</td>
                             <td><a href='deletar.php?id=$linha[0]'>Deletar</a></td>
                             <td><a href='editar.php?id=$linha[0]'>Editar</a></td>
                        </tr>
                      
                  ");
           
           
           }
           
           
           print("</table>");
           print("</div>");
    }
    
    mysqli_close($conn);
           
?>

<br>

<h3><a class="voltar" href="index.php">&larr;Voltar</a></h3>

<script src="js/main.js"></script>
