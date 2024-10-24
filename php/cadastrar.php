<?php
    session_start();
    include 'conexao.php';

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlspecialchars(trim($_POST['username']));
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $tipo = 'User';
    
        // Verifica se o usuário já existe
        $sql_check = "SELECT * FROM usuarios WHERE nome_user = ?";
        $stmt_check = $conexao->prepare($sql_check);
        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {

            header('Location: cadastrar.php?error=usuario_existente');
            exit(); // Para evitar execução a seguir caso o usuário já exista

        } else {
            // Inserir o novo usuário no banco de dados
            $sql = "INSERT INTO usuarios (nome_user, password_user, type) VALUES (?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $tipo);

            if ($stmt->execute()) {


                header('Location: login.php');
            } else {

                
                header('Location: homepage.php');
            }
        }

        
            $stmt_check->close();
            $conexao->close();
        }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Cadastro - Harvest Inc</title>
    </head>
    <body class="body-cadastrar-login">
        <div class="form-login">
            <div class="lugar-logo">
                <a href="../index.php"><button class="button-voltar"><img class="imagem-voltar" src="../img/de-volta.png" alt=""></button></a>
                <img class="logo-cadastrar" src="../img/harvest_inc.png" alt="">
                <button class="button-voltar1"></button>
            </div>
            
            <form class="'" action="" method="post">
                
                
                <h1 class="titulo-login">Cadastrar</h1>

                <div class="campos-texto">
                    <label class="identificador-campo"  for="username">Usuário:</label>
                    <input class="campos-info" type="text" id="username" name="username" required>
                </div>
                
                <div class="campos-texto">
                    <label class="identificador-campo" for="password">Senha:</label>
                    <input class="campos-info" type="password" id="password" name="password" required>
                </div>
                
                <div class="alinhamento-button">
                    <button class="button-entrar" type="submit">Cadastrar</button>
                </div>
            </form>
            <div id="div-redirecionamento">
                <a id="redirecionamento" href="login.php">Já tem cadastro? Faça seu login</a>
            </div>
        </div>
    </body>
</html>