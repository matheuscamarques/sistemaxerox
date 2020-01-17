<?php
   include 'connection.php';
   include 'registra_usuario.php';

   //AO IMPLEMENTAR FUNÇÕES NÃO ESQUEÇA DE FECHAR A CONNEÇAO $conn.close();

   $usuario = new Usuario;

   $usuario->cpf = $_POST['cpf'];
   $usuario->nome=  $_POST['nome'];
   $usuario->email= $_POST['email'];
   $usuario->senha= $_POST['senha'];
   $usuario->data_inicio="09/07/1997";

  

   registraUsuario($usuario,$conn);





?>