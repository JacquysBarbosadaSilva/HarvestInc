<?php
    session_start();
    include 'conexao.php';

    $idUsuario = $_SESSION['id_usuario'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $novoNome = $_POST['username'];
        $novaSenha = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (empty($novoNome) || empty($novaSenha)) {
            echo "Por favor, preencha todos os campos.";
            exit;
        }

        $sql = "UPDATE usuarios SET nome_user = ?, password_user = ? WHERE id = $idUsuario";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $novoNome, $novaSenha);

        if ($stmt->execute()) {
            echo "<script>alert('Usuario atualizado com sucesso')</script>";
        } else {
            echo "Erro ao alterar usuário: " . $stmt->error;
        }

        $stmt->close();
    }

    $conexao->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
        <title>Perfil - Históra e Tradição</title>
    </head>
    <body>
    <header>
            <nav>
                <div class="nav-bar">
                    
                    <div class="navegacao-paginas">
                        <div class="logo">
                            <a href="login.php">
                                <img class="logo-nav-bar" src="../img/harvest_inc.png" alt="Logo">
                            </a>
                        </div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="planos.php">Planos</a></li>
                            <li><a href="contato.php">Contato</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
                        </ul> 
                    </div>
                    <div class="alinhamento-login-finalizado">
                        <?php
                            if (isset($_SESSION['usuario']) && ($_SESSION['tipo'])) {
                                echo "
                                <div class='login-finalizado-navbar'>
                                    <p class='button-login-logado'>Olá, " . $_SESSION['usuario'] . "!</p>
                                </div>";
                            } else {
                                echo "
                                <div class='login-finalizado-navbar'>
                                    <p class='button-login-logado'>Olá, admin " . $_SESSION['usuario'] . "!</p>
                                </div>";
                            }
                        ?>  
                    <a href="perfil.php"><img class="perfil-icone" src="../img/icone-perfil.png" alt=""></a>
                </div>
                </div>
            </nav>

        </header>

        <div class="fundo-da-pagina">
            <div class="fundo-form">
                <img class="logo-cadastrar" src="../img/harvest_inc.png" alt="">
                <h1 class="titulo-login">Perfil</h1>
                
                <div class="alinhamento-form">
                    <div class="alinhamento-imagem-icone"><img class="imagem-icone" src="../img/icone-perfil.png" alt=""></div>

                    <?php
                        if (isset($_SESSION['usuario']) && ($_SESSION['tipo'])) {
                            echo "
                            <div class='perfil-dialogo-alinhamento'>
                                <h2 class='perfil-dialogo'>Bem-Vindo, estudante " . $_SESSION['usuario'] . "!</h2>
                            </div>";
                        } else {
                            echo "
                            <div class='login-finalizado-navbar'>
                                <h2>Bem-Vindo, professor " . $_SESSION['usuario'] . "!</h2>
                            </div>";
                        }
                    ?>

                    

                    
                </div>
                <div class="centralizacao-formulario">
                    <form class="tamanho-formulario" action="" method="post">
                        <div class="campos-texto">
                            <label class="identificador-campo"  for="username">Usuário:</label>
                            <input class="campos-info" type="text" id="username" name="username" required>
                        </div>
                    
                        <div class="campos-texto">
                            <label class="identificador-campo" for="password">Senha:</label>
                            <input class="campos-info" type="password" id="password" name="password" required>
                        </div>

                        <div class="apenas-button-form-alterar">
                            <button class="button-alterar" type="submit">Alterar</button>
                        </div>
                    </form>
                </div>

                <div class="apenas-button">
                    <form class="tamanh-total" action="deletar.php" method="post">
                        <button class="button-alterar tamanho" type="submit">Deletar</button>
                    </form>
                    
                    <a class="button-logout" href="logout.php">Logout</a>
                </div>
                <div>
                </div>
                
            </div>
        </div>
    </body>
</html>