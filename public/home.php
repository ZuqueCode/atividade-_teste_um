<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header("location: ../index.php");
    exit();
}


?>






<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homet</title>
</head>
<body>
    <h2>bom dia</h2>
<p> usuario logado:

<?php echo $_SESSION["usuario"];?>

</p>
<a href="logout.php">sair</a>


</body>
</html>