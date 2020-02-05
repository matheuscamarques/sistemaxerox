<?php include "./arquitetura/header.php"; ?>

<?php include "./arquitetura/menu.php"; ?>

<div class="user_info">
    
    <?php 
            $status = @$_GET['status'];
            $cpf = intval($_SESSION['cpf_user']);
            //var_dump($cpf);
            //echo $cpf."<br>";

            $sql = "select *from user_info where cpf = $cpf;";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                echo "<div class='table'>";
                echo "<table>";
                echo "<tr>";
                echo     "<th>CPF</th>";
                echo    "<th>NOME</th> ";
                echo    "<th>SOBRENOME</th>";
                echo    "<th>CEP</th>";
                echo    "<th>ENDEREÇO</th>";
                echo    "<th>BAIRRO</th>";
                echo    "<th>CIDADE</th>";
                echo    "<th>ESTADO</th>";
                echo     " <th>DATA NASC</th>";
                echo     " <th>IMAGEM</th>";
                echo     " <th>TEL</th>";
                echo "</tr>";


                while($row = mysqli_fetch_assoc($result)) {

                      echo  "<tr>";
                      echo      "<td>".$row["cpf"]."</td>";
                      echo      "<td>".$row["nome"]."</td>";
                      echo     " <td>".$row["sobrenome"]."</td>";
                      echo     " <td>".$row["cep"]."</td>";
                      echo     " <td>".$row["endereco"]."</td>";
                      echo     " <td>".$row["bairro"]."</td>";
                      echo     " <td>".$row["cidade"]."</td>";
                      echo     " <td>".$row["estado"]."</td>";
                      echo     " <td>".$row["data_nascimento"]."</td>";
                      echo     " <td>".$row["imagem"]."</td>";
                      echo     " <td>".$row["tel"]."</td>";
                      
                      
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
