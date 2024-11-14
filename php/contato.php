<?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario']) || !isset($_SESSION['tipo'])) {
        // Redireciona para a página inicial (index.php)
        header('Location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Planos - Harvest Inc</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kavivanar&display=swap" rel="stylesheet">
        <script src="../javascript/main.js"></script>
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
                                <li><a href="home_page_logado.php">Home</a></li>
                                <li><a href="planos.php">Planos</a></li>
                                <li><a href="#">Contato</a></li>
                                <li><a href="feedback.php">Feedback</a></li>
                            </ul> 
                        </div>
                        <div class="alinhamento-login-finalizado">
                            <?php
                                if (isset($_SESSION['usuario']) && ($_SESSION['tipo'])) {
                                    echo "
                                    <div class='login-finalizado-navbar'>
                                        <p class='button-login-logado'>Olá, " . strtoupper($_SESSION['usuario']) . "</p>
                                    </div>";
                                } else {
                                    echo "
                                    <div class='login-finalizado-navbar'>
                                        <p class='button-login-logado'>Olá, admin " . strtoupper($_SESSION['usuario']) . "</p>
                                    </div>";
                                }
                            ?>  
                        <a href="perfil.php"><img class="perfil-icone" src="../img/logo-usuario.jpg" alt=""></a>
                    </div>
                    </div>
                </nav>

            </header>

            <main class="contatoMain">
                <h1 id="h1-contatos">Contatos</h1>
                <div class="grid-container">
                    <div class="atendenteDuvidas">
                        <img class="imagem-atendente" src="../img/miguel_sales.png" alt="">
                        <div class="informacao-contato">
                            <h3>Miguel Sales</h3>
                            <h4>Desenvolvedor</h4>
                            <p>Em caso de dúvidas, entre em contato:</p>
                            <div class='container-redes-sociais'>
                                <div class='imagem-redes-sociais'>
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-linkedin.jpg" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-gmail.png" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-instagram.jpg" alt="">
                                </div>
                            </div>
                        </div> 
                    </div>
            
                    <div class="atendenteDuvidas">
                        <img class="imagem-atendente" src="../img/jacquys_barbosa.png" alt="">
                        <div class="informacao-contato">
                            <h3>Jacquys Barbosa</h3>
                            <h4>Desenvolvedor</h4>
                            <p>Em caso de dúvidas, entre em contato:</p>
                            <div class='container-redes-sociais'>
                                <div class='imagem-redes-sociais'>
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-linkedin.jpg" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-gmail.png" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-instagram.jpg" alt="">
                                </div>
                            </div>
                        </div> 
                    </div>
            
                    <div class="atendenteDuvidas">
                        <img class="imagem-atendente" src="../img/victor_koba.png" alt="">
                        <div class="informacao-contato">
                            <h3>Victor Koba</h3>
                            <h4>Desenvolvedor</h4>
                            <p>Em caso de dúvidas, entre em contato:</p>
                            <div class='container-redes-sociais'>
                                <div class='imagem-redes-sociais'>
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-linkedin.jpg" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-gmail.png" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-instagram.jpg" alt="">
                                </div>
                            </div>
                        </div> 
                    </div>
            
                    <div class="atendenteDuvidas">
                        <img class="imagem-atendente" src="../img/nicole_cafalloni.png" alt="">
                        <div class="informacao-contato">
                            <h3>Nicole Cafalloni</h3>
                            <h4>Desenvolvedor</h4>
                            <p>Em caso de dúvidas, entre em contato:</p>
                            <div class='container-redes-sociais'>
                                <div class='imagem-redes-sociais'>
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-linkedin.jpg" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-gmail.png" alt="">
                                    <img class="fa fa-linkedin fa-fw" src="../img/logo-instagram.jpg" alt="">
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </main>
    </body>
</html>