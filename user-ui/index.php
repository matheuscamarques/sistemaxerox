<?php session_start();?>

<html>
    <head>
        <title><?php $title = $_SESSION['user']; echo "Cliente: ".$title;  ?></title>
        	
<link rel="stylesheet" type="text/css"  href="estilo.css" />
    </head>
<body>
<ul id="nav"> 
    <li><a href="./index.php">Home</a></li> 
    <li><a href="./pedido.php">Fazer pedido</a></li> 
    <li><a href="./meu_pedido.php">Meus pedidos</a></li> 
    
    </li>
 
    <li><a href="#">Contato</a></li> 
  </ul>



    <article><?php
      ?></article>



</body>
</html>







