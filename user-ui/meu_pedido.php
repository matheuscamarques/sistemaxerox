<?php include "./arquitetura/header.php"; ?>
<?php include "./arquitetura/menu.php"; ?>

  <ul id="nav" style="float:right;width:335px;border:1px solid white;"> 
    <li style="float:right; border:1px solid white;background-color:green;" ><a href="./meu_pedido.php?status=Pronto"><p style="font-size:10px;">PRONTOS</p></a></li> 
    <li style="float:right;border:1px solid white;background-color:orange" ><a href="./meu_pedido.php?status=Aguardando orçamento"><p style="font-size:10px;">ORÇAMENTO</p></a></li> 
    <li style="float:right;border:1px solid white;background-color:red"><a href="./meu_pedido.php?status=Rejeitado"><p style="font-size:10px;">REJEITADOS</p></a></li> 

  </ul>




    <div class="meus_pedidos">
    
    <?php 
            $status = @$_GET['status'];
            $cpf = intval($_SESSION['cpf_user']);
            //var_dump($cpf);
            //echo $cpf."<br>";

            $sql = "SELECT cpf , a.idPedido,a.hora,a.data,a.arquivo,a.quantidade_paginas,a.num_copias,a.valor,a.status FROM Pedido_usuario INNER JOIN Pedido AS a using(idPedido) where cpf=$cpf AND a.status ='$status'  ORDER BY a.idPedido desc;";

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
                      echo     " <td>".$row["valor"]." R$"."</td>";
                      echo     " <td>".$row["status"]."</td>";
                      echo      " <td> <a href='".$row["arquivo"]."'>Arquivo</a> </td>";
                      
                      echo  " </tr>";

                   // echo "cpf: " . $row["cpf"]. " - ID : " . $row["idPedido"]."hora: " . $row["hora"]."<br>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<script>console.log('0 results');</script>";
            }

            mysqli_close($conn);
    
    ?>
    
    
    </div>



    <?php include "./arquitetura/footer.php"; ?>





