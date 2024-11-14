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
                                <li><a href="#">Planos</a></li>
                                <li><a href="contato.php">Contato</a></li>
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
                        <a href="perfil.php"><img class="perfil-icone" src="../img/icone-perfil.png" alt=""></a>
                    </div>
                    </div>
                </nav>

            </header>

            <main id="main-plano">
        <h1 id="h1-plano">PLANOS HARVEST</h1>

    <div class="card-inicial">

            <div class="card-sobreposicao">
                <div>
                    <h1 class="infor-inicio">Elabore um plano que atenda às necessidades específicas do seu negócio</h1>
                    <p id="text-sub-titulo">Veja o que a Harvest proporciona</p>

                    <div class="card-informacao">
                        <img class="icon-planos" src="../img/icon-produtividade.png" alt=""> <p id="text-infor">Nossa empresa oferece soluções que elevam a produtividade por meio de tecnologia avançada e eficiente. 
                        Com nossas ferramentas, você maximiza resultados, alcançando um desempenho superior.</p>
                    </div>
        
                    <div class="card-informacao">
                        <img class="icon-planos" src="../img/icon-lucros.png" alt=""> <p id="text-infor">Aumenta seus lucros proporcionando praticidade e resultados concretos. 
                        Nossas soluções otimizam processos e garantem um retorno financeiro superior.</p>
                    </div>
                </div>
                <div></div>
                   <div class="sombra-img"></div>
                <img id="img-feira" src="../img/img-feira.png" alt="">
            </div>

        </div>

    </main>
    </body>
</html>