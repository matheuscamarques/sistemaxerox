<?php session_start();?>

<html>
    <head>
        <title><?php $title = $_SESSION['user']; echo "Cliente: ".$title;  ?></title>
        	
<link rel="stylesheet" type="text/css"  href="estilo.css" />
    </head>
<body>
<ul id="nav"> 
    <li><a href="./index.php">Home</a></li> 
    <li><a href="./meu_pedido.php">Meus Pedidos</a></li> 
    
 
  </ul>



  <div class="pedido"><?php
     $user_cpf = $_SESSION['cpf_user'];

     
     include 'ui-pedido.php';  ?></div>





