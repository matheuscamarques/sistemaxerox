function ValidarFrmCadastroUsuario() {

    var txtNome = frmCadastrarUsuario.nome.value;
    var txtEmail = frmCadastrarUsuario.email.value;
    var txtCpf = frmCadastrarUsuario.cpf.value;
    var txtSenha = frmCadastrarUsuario.senha.value;
    var txtConfSenha = frmCadastrarUsuario.confsenha.value;

    // Valida campos vazios
    if (txtNome == "") {
        alert('Preencha o campo NOME!');
        frmCadastrarUsuario.nome.focus();
        return false;
    }
    
    if (txtEmail == "") {
        alert('Preencha o campo E-MAIL!');
        frmCadastrarUsuario.email.focus();
        return false;
    }

    if (txtCpf == "") {
        alert('Preencha o campo CPF!');
        frmCadastrarUsuario.cpf.focus();
        return false;
    }

    if (txtSenha == "") {
        alert('Preencha o campo SENHA!');
        frmCadastrarUsuario.senha.focus();
        return false;
    }

    if (txtConfSenha == "") {
        alert('Preencha o campo CONFIRMAR SENHA!');
        frmCadastrarUsuario.confsenha.focus();
        return false;
    }

    // Verifica se as senhas são iguais
    if (txtSenha != txtConfSenha) {
        alert('As duas SENHAS devem ser iguais!');
        frmCadastrarUsuario.confsenha.focus();
        return false;
    } 

}