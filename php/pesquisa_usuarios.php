<?php

require('connection.php');

$sql = "SELECT *FROM Usuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "CPF: " . $row["cpf"]. " - NOME: " . $row["usuario"]. " - EMAIL: " . $row["email"]."- DATA-INICIO: ".$row["data_inicio"]."<br>";
    }
}else{
    echo "0 results";
}

$conn->close();

?>