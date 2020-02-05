<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>

    <?php include '../php/connection.php'; 
    session_start();
        if($_SESSION['logado']==true){
            header('Location: ../user-ui/');

        }
        else{
            echo "Acesso restrito";
        }
    
    ?>


</head>
<body>
    
</body>
</html>