<?php include "../php/connection.php"; session_start();?>

<html>
    <head>
        <title><?php $title = $_SESSION['user']; echo "Cliente: ".$title;  ?></title>      	
        <link rel="stylesheet" type="text/css"  href="estilo.css" />
        <link rel="shortcut icon" href="https://cdn1.iconfinder.com/data/icons/CrystalClear/128x128/mimetypes/pdf.png" />
        
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5b2c062cd0b5a54796820da0/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
    </head>
<body>


