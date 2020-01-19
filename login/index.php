<?php include '../interface/header.html';?>
 


<?php include '../form/login.php';?>

<?php

    //Conexão
    require_once '../php/connection.php';

    //Sessão
    session_start();

    //Button login
    if(isset($_POST['btn-entrar'])){
        $erros = array();
        $cpf = mysqli_escape_string($conn,$_POST['cpf']);
        $senha = mysqli_escape_string($conn,$_POST['senha']);



        if(empty($cpf) || empty($senha))
        {
           $erros[]= "O campo login/senha precisa ser preenchido";

        }
        else{
            $sql = "SELECT cpf FROM Usuario WHERE cpf=$cpf";
            $resultado = mysqli_query($conn,$sql);
            


            

            if(mysqli_num_rows($resultado)>0){
                $senha = md5($senha);
                
                
                $sql = "SELECT *FROM Usuario WHERE cpf=$cpf AND senha='$senha'";
                //ERRO , A PRÓXIMA LINHA PULA
                // FIXX ME
                echo "<script>alert('$sql')</script>";
                echo $sql;

                $resultado = mysqli_query($connect,$sql);


                    if(mysqli_num_rows($resultado)==1){
                        $dados = mysqli_fetch_array($resultado);
                        $_SESSION['logado'] = true;
                        $_SESSION['cpf_user'] = $dados['cpf'];
                        header('Location: home.php');
                    }
                    else{
                        $erros[] = "CPF e SENHA não conferem.";
                    }
            }
            else{
               $erros[] = "CPF não cadastrado em nosso sistema.";
            }

        }

    }


    if(!empty($erros)){
        foreach($erros as $erro){
            echo "<script>alert('$erro')</script>";
        }
    }


?>

<?php include '../interface/footer.html';?>
