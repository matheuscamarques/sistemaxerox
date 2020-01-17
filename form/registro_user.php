
    <div class="container-cadastro">
        <div class="cadastro-usuario">
            <div class="header-cadastro">
                <h1>Registre-se</h1>
            </div>
            <form name="frmCadastrarUsuario" action="index.php" method="post">
                <p>
                    <label for="">Nome:</label><br>
                    <input type="text" name="nome">
                </p>
                <p>
                    <label for="">E-mail:</label><br>
                    <input type="email" name="email">
                </p>
                <p>
                    <label for="">CPF:</label><br>
                    <input type="text" name="cpf">
                </p>
                <p>
                    <label for="">Senha:</label><br>
                    <input type="password" name="senha">
                </p>
                <p>
                    <label for="">Confirmar senha:</label><br>
                    <input type="password" name="confsenha">
                </p>
                <br>
                <p>
                    <button type="submit" class="button-registrar" onclick="return ValidarFrmCadastroUsuario()">Cadastrar</button>
                </p>
                <br>
    
                <?php
                    include '../php/connection.php';
                    include '../php/registra_usuario.php';

                    //AO IMPLEMENTAR FUNÇÕES NÃO ESQUEÇA DE FECHAR A CONNEÇAO $conn.close();

                    $usuario = new Usuario;

                    $usuario->cpf = @$_POST['cpf'];
                    $usuario->nome=  @$_POST['nome'];
                    $usuario->email= @$_POST['email'];
                    $usuario->senha= @$_POST['senha'];
                    $usuario->data_inicio= date("d-m-yy");

                    if(!($usuario->cpf == NULL))
                    {
                        registraUsuario($usuario,$conn);
                    }

                    

                    

                ?>
        
            </form>
        </div>
    </div>

        



