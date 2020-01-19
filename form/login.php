
   
    <div class="container-cadastro">
        <div class="cadastro-usuario">
            <div class="header-cadastro">
                <h1>Login</h1>
            </div>
            <form name="frmCadastrarUsuario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               
                <p>
                    <label for="">CPF:</label><br>
                    <input type="text" name="cpf">
                </p>
                <p>
                    <label for="">Senha:</label><br>
                    <input type="password" name="senha">
                </p>
                
                <br>
                <p>
                    <button type="submit" name="btn-entrar" class="button-registrar" onclick="">Connectar</button>
                </p>
                <br>
    
              
        
            </form>
        </div>
    </div>

        



