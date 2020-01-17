
<div id="registrausuario" name="registrausuario" class="registrausuario">
        <h1>CADASTRO</h1>
    <form action="index.php"  method="post">

        <div>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required />
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required />
        </div>

        <div>
            <label for="cpf">Cpf</label>
            <input type="text" id="cpf" name="cpf" required />
        </div>

        <div>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" id="senha" required />
            
        </div>
        <div>
            <label for="senha">Re-Senha</label>
            <input type="password" id="resenha" name="resenha" id="resenha" required />
            
        </div>

        <div class="button">
            <button type="submit">Registrar</button>
           
            <button class="buttonr" type="submit">Voltar</button>
        
    
        </div>


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

<script>
    var nome = document.getElementById("nome");
    var email = document.getElementById("email");
    var cpf = document.getElementById("cpf");
    var password = document.getElementById("senha")
  , confirm_password = document.getElementById("resenha");

  

    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Senhas diferentes!");
    } else {
        confirm_password.setCustomValidity('');
    }
    }

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


</script>


