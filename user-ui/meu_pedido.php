<?php
include '../php/connection.php';

session_start();?>

<html>
    <head>
        <title><?php $title = $_SESSION['user']; echo "Cliente: ".$title;  ?></title>
        	
<link rel="stylesheet" type="text/css"  href="estilo.css" />
    </head>
<body>
<ul id="nav"> 
    <li><a href="./index.php">Home</a></li> 
    <li><a href="./pedido.php">Fazer pedido</a></li> 
    <li><a href="./meu_pedido.php">Meus pedidos</a></li> 
    
    </li>
 
    <li><a href="#">Contato</a></li> 
  </ul>



    <div class="meus_pedidos">
    
    <?php 
            $cpf = intval($_SESSION['cpf_user']);
            //var_dump($cpf);
            //echo $cpf."<br>";

            $sql = "SELECT cpf , a.idPedido,a.hora,a.data,a.arquivo,a.quantidade_paginas,a.num_copias,a.valor,a.status FROM Pedido_usuario INNER JOIN Pedido AS a using(idPedido) where cpf=$cpf ;";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                echo "<div class='table'>";
                echo "<table>";
                echo "<tr>";
                echo     "<th>CPF</th>";
                echo    "<th>ID</th> ";
                echo    "<th>HORA</th>";
                echo    "<th>DATA</th>";
                echo    "<th>QNT PAGINAS</th>";
                echo    "<th>NUMERO COPIAS</th>";
                echo    "<th>VALOR</th>";
                echo    "<th>STATUS</th>";
                echo     " <th>ARQUIVO</th>";
                echo "</tr>";


                while($row = mysqli_fetch_assoc($result)) {

                      echo  "<tr>";
                      echo      "<td>".$row["cpf"]."</td>";
                      echo      "<td>".$row["idPedido"]."</td>";
                      echo     " <td>".$row["hora"]."</td>";
                      echo     " <td>".$row["data"]."</td>";
                      echo     " <td>".$row["quantidade_paginas"]."</td>";
                      echo     " <td>".$row["num_copias"]."</td>";
                      echo     " <td>".$row["valor"]."R$"."</td>";
                      echo     " <td>".$row["status"]."</td>";
                      echo      " <td> <a href='".$row["arquivo"]."'>Arquivo</a> </td>";
                      
                      echo  " </tr>";

                   // echo "cpf: " . $row["cpf"]. " - ID : " . $row["idPedido"]."hora: " . $row["hora"]."<br>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
    
    ?>
    
    
    </div>



</body>
</html>







