<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome'])) {
        $nome_usuario = $_POST['nome'];
        $email_usuario = $_POST['email'];
        $senha_usuario = password_hash($_POST['senha'], null);

        $query = "INSERT INTO usuarios (email_usuario, senha_usuario, nome_usuario) VALUES (?, ?, ?)";
        $statement = $conexao->prepare($query);
        $statement->bind_param("sss", $email_usuario,$senha_usuario, $nome_usuario);
        $statement->execute();
        echo "usuario registrado";
}

        if ($conexao->error) {
            die("Erro: {$conexao->error}");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Realize seu cadastro!</h1>

        <label for="">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="">Senha:</label>
        <input type="password" name="senha" required>

        <input type="submit" value="Cadastrar">
        <a href="index.php">Já possui cadastro? Faça login!</a>
    </form>
</body>
</html>