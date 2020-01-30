









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ERROR</title>
</head>
<body>
<div class="tratamento">
<?php
   // var_dump($_FILES);
    include '../php/connection.php'; 
    include './tratamento.php';

    session_start();
        if($_SESSION['logado']==true){
            echo "<script>console.log('Logado com sucesso!');</script>";

        }
        else{
            echo "Acesso restrito";
        }
    
    
    
    if(isset($_POST['enviar-formulario'])){
        session_start();
        $formatosPermitidos = array("pdf","PDF","jpg","png");
        $cores = $_POST['color'];
        $dim = $_POST['dim'];
        $fv = $_POST['fv'];
        $mensagem = $_POST['mensagem'];
        $numeroCopias = $_POST['n_copias'];

        //PEGANDO O NOME DO USUARIO.
        $username = $_SESSION['user'];

       
        

        

        $extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);
        
        if(in_array($extensao,$formatosPermitidos)){
            $pasta = "./arquivos/"; 
            $temporario = $_FILES['arquivo']['tmp_name'];

            $novoNome = "$username".date('m_d_yy')."_".uniqid().".$extensao";
            
            $destino = $pasta.$novoNome;

            if(move_uploaded_file($temporario,$destino)){

                $processamento = processandoPDF($conn,$novoNome,$cores,$dim,$fv,$numeroCopias,$mensagem);
                
                if($processamento != true){
                    $mensagem = "<br><li>Upload feito com sucesso!</li>";
                }
                else{
                    $mensagem = "<br><li>Erro contate o programador</li>";
                }
            }
            else{
                $mensagem = "<br><li>Upload falhou</li>";
            }
        }

        else{
           $mensagem= "<br><li>Formato inválido Invalido</li>";
        }
    }

    echo "$mensagem";
    
?>
</div>
    
<h1>Novo pedido.</h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    

   
    
    <p> CORES <select name="color">
    <option value="PB">P&B</option>
    <option value="COLORIDA">COLORIDA</option>
    </select> </p>

  <p> DIMENSÕES <select name="dim">
    <option value="A4">A4</option>
    <option value="A3">A3</option>
 </select> </p>

 <p> FRENTE E VERSO <select name="fv">
     <option value="true">Sim</option>
    <option value="false">Não</option>
 </select> </p>

<p>CÓPIAS<input type="number" name="n_copias">  </input></p>
<p>MENSAGEM <textarea name="mensagem" id="mensagem" placeholder="Mensagem*" ></textarea> <p/>

 <p>Selecione o arquivo: <input type="file" name="arquivo"></p><br>
 <p>  <input type="submit" name="enviar-formulario" value="Enviar"/></p>

</form>

</body>
</html>