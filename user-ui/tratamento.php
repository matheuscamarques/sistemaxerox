<?php
include '../php/pdf.php';

function processandoPDF($conn,$novoNome,$cores,$dim,$fv,$numeroCopias,$mensagens){
    $cpf = $_SESSION['cpf_user'];
    $caminho = "arquivos/".$novoNome;
    $quantidade_pgs = numeroPaginasPdf($caminho);

    //echo "LOCAL: ".$caminho."<br>";;
    //echo "QUANTIDADE DE PÁGINAS: ".$quantidade."<br>";
    //echo "DIMENSÃO: ".$dim."<br>";
    //echo "FV: ".$fv."<br>"; 
    //echo "NUMERO DE COPIAS: ".$numeroCopias."<br>"; 
    //echo "MENSAGEM: ".$mensagens."<br>"; 


    $hora= date('h:m:s');
    $data = date('d-m-yy');
    $status = "Aguardando orçamento";

    echo "<h2>Relatório do Pedido.</h2>";
    
    //VALORES SÃO DEFINIDOS AQUI EXEMPLO QUANDO COPIAS SÃO > 50 E FRENTE VERSO O VALOR MUDA.

    $valor = 0.15 *$quantidade_pgs*$numeroCopias;
    
    $valor = number_format($valor, 2, '.', '');

    $sql = "INSERT INTO Pedido VALUES('0','$caminho','$hora','$data','$mensagens','$status','$valor','$cores','$dim','$fv','$quantidade_pgs','$numeroCopias');";


    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "<li>Pedido registrado id do pedido é: " . $last_id."</li><br><li>O valor aproximado do pedido é de ".$valor."R$"." </li><br><li>Aguarde a resposta da equipe em seu e-mail sobre esse pedido.</li>";

        $sql = "INSERT INTO  Pedido_usuario VALUES('$cpf','$last_id');";
            if(mysqli_query($conn,$sql)){
                echo "<br><li>Pedido associado ao usuario com sucesso</li>";
            }
            else{
                echo "<br><li>Falha ao associar pedidoa ao usuario</li>";
                echo "<br><li>Error: " . $sql . "<br>" . mysqli_error($conn)."</li>";
                return false;
            }
        
    } else {
        echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        return true;
    }
    
    mysqli_close($conn);

}


?>