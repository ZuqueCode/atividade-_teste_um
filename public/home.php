<?php

// Importa a conexão com o banco de dados
include("../infra/db/connect.php");

// Verifica se o usuário está autenticado
if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
}

// Verifica se o formulário foi enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Recebe os dados digitados
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Insere um novo usuário no banco
    $sql = "INSERT INTO users (username, password)
    VALUES ('$usuario','$senha')";

    // Executa a consulta
    if($conn->query($sql) === TRUE){

        // Mensagem de sucesso
        echo "<script>alert('Usuário Cadastrado com sucesso!')</script>";

    }else{

        // Mensagem de erro
        echo "<script>alert('Erro Usuário Não Cadastrado!')</script>";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Arquivo CSS da aplicação -->
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <?php
    // Importa o menu de navegação
    include("../public/component/navbar.php");
    ?>

    <h2>Bem-vindo!</h2>

    <p>
        Usuário logado:
        <?php echo $_SESSION["usuario"]; ?>
    </p>

    <h4>Cadastrar Novo Usuário</h4>

    <!-- Formulário de cadastro -->
    <form method="POST">

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario">

        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha">

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <?php
    // Exibe a tabela de usuários
    include("../public/component/table.php");
    ?>

    <!-- Link para logout -->
    <a href="logout.php">Sair</a>

</body>
</html>