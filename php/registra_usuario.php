<?php
        include 'connection.php';
        include 'objetos.php';



        function validaCPF($cpf) {
        
            // Extrai somente os números
            $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
            
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                return false;
            }
            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return false;
            }
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;

        }


        function registraUsuario(Usuario $usuario,$conn)
        {

                if(validaCPF($usuario->cpf)==false){

                    if(!($usuario->cpf == NULL)){
                        echo "<div class='alertas'>O Cpf digitado parece ser inválido</div><br>";
                    }
                    
                }
                else{
                    //echo "Cpf válido<br>";

                    $senhaMD5 = md5($usuario->senha);


                    $sql = "INSERT INTO Usuario VALUES('$usuario->nome',
                                                '$usuario->email',
                                                '$senhaMD5',
                                                '$usuario->data_inicio',
                                                '$usuario->cpf')";

                    $res = $conn->query($sql);


                    if(mysqli_affected_rows($conn) && mysqli_affected_rows($conn)!=-1 ){
                        echo "<div class='alertass'>Parabéns você foi cadastrado com sucesso.</div><br>";}
                    elseif(mysqli_affected_rows($conn) == -1)
                        echo "<div class='alertas'>Seu CPF já está registrado no sistema.</div><br>";
                    else{
                        echo "Erro ao inserir os dados:".mysqli_error($conn);}
                }


                $conn->close();



        }







?>

