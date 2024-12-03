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
        <title>Harvest.Inc</title>
        <link rel="icon" type="image/png" id="tamanho-icone" href="../img/harvest_inc-icone.png">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Kavivanar&family=Lalezar&display=swap" rel="stylesheet">  
        <script src="../javascript/main.js" defer></script>
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
                                
                                <a href=perfil.php><p class='button-login-logado'>Olá, " . $_SESSION['usuario'] . "!</p></a>
                                    
                                </div>";
                            } else {
                                echo "
                                <div class='login-finalizado-navbar'>
                                    <a href=perfil.php><p class='button-login-logado'>Olá, admin " . $_SESSION['usuario'] . "!</p></a>

                                </div>";
                            }
                        ?>  
                </div>
                </div>
            </nav>

        </header>

        <main>
            <section class="background_bem_vindo">
                <div class="transparet_background">
                    <div class="bem_vindo">
                        <h1 class="titulo-bem-vindo line-below">Bem Vindo</h1>
                    </div>

                    
                </div>
                
            </section>

            <button id="botao-scroll" class="botao-scroll" aria-label="Ir para a próxima seção">
                <i class="fas fa-arrow-down"></i>
            </button>

            <div id="proxima-secao">
                <section class="section-separacao-quem-somos">
                    <div class="container-cards">
                        <div class="retangulos">
                            <div class="amarelo"></div>
                            <div class="laranja"></div>
                            <div class="marrom"></div>
                        </div>
                    </div>

                

                    <div class="container-conteudos-pi">
                        <div id="container-quem-somos">
                            <h2 class="titulo-quem-somos">Quem Somos?</h2>
                            <p class="descricao-conteudo">A Harvest Inc. é uma empresa de agropecuária focada na excelência, sustentabilidade e inovação. Nosso compromisso é otimizar a produção e preservar o meio ambiente.</p>
                            <p class="descricao-conteudo">Produzimos alimentos de alta qualidade utilizando tecnologias avançadas e práticas agrícolas responsáveis.</p>
                            <p class="descricao-conteudo">Investimos na capacitação de nossos colaboradores e promovemos a segurança em todas as operações.</p>
                            <p class="descricao-conteudo">Na Harvest Inc., trabalhamos para um futuro agrícola produtivo e sustentável.</p>
                        </div>
                        <div>
                            <img class="tamanho-img" src="https://i.ibb.co/NxCX5Q3/img-horta.png" alt="">
                        </div>
                    </div>

                </section>
            </div>


            
            <section class="section-separacao-2">
                <div class="container-conteudos-principios">
                    <div>
                        <img class="img-broto" src="https://i.ibb.co/1ztKJj1/broto.png" alt="">
                    </div>
                    <div id="container-principios">
                        <h2 class="titulo-quem-somos">Princípios</h2>
                        
                        <!-- Conteúdo que será exibido ao clicar em um card -->
                        <p class="descricao-conteudo">Cultivar a terra é uma missão que transforma vidas, e essa é a essência da Harvest Inc. Estamos inseridos em uma vasta cadeia de produção que vai muito além dos campos. Nosso trabalho envolve milhares de pessoas em todo o mundo, abrangendo áreas como tecnologia, pesquisa, mercado, comércio, transporte e indústria.</p>
                        
                        <div class="cards-principios">

                            <div class="card-principios-conteudo">
                                <h3 class="titulo-cards">Investimento em tecnologias</h3>
                                <div class="alinhamento-icones">
                                    <img class="icone-card" src="https://i.ibb.co/VWVytC2/despesas.png" alt="">
                                </div>
                                <p class="descricao-conteudo-card">Investir em novas práticas e tecnologias é fundamental para nos mantermos na vanguarda do mercado global. Nosso compromisso é acompanhar os agricultores em todas as etapas do seu trabalho, oferecendo suporte contínuo e soluções inovadoras. </p>

                            </div>
                            
                            <div class="card-principios-conteudo">
                                <h3 class="titulo-cards">Cooperatividade</h3>
                                <div class="alinhamento-icones">
                                    <img class="icone-card" src="https://i.ibb.co/h2ZkjNQ/acordo.png" alt="">
                                </div>
                                <p class="descricao-conteudo-card">Na Harvest Inc., acreditamos que o sucesso dos nossos parceiros é o nosso sucesso, e trabalhamos incansavelmente para garantir que eles tenham as melhores ferramentas e conhecimentos para prosperar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-separacao-collums">

                <div class="container-produtividade espacamento">

                    <img class="tmnh-imagem-colheita" src="../img/trator-colheita.jpg" alt="Imagem de trator colhendo">

                    <div class="conteudo-produtividade">
                        <h2 class="titulo-home-page-info">Produtividade</h2>
                        <p>Produtividade é uma prioridade fundamental e um reflexo do nosso compromisso com a excelência e a sustentabilidade. Investimos continuamente em tecnologias de ponta, como sistemas de irrigação automatizados e drones para monitoramento de culturas, o que nos permite otimizar o uso dos recursos e maximizar a produção.</p>
                    </div>
                </div>

                
            </section>

            <div class="alinhamento-linha"><img class="height-linha-folha" src="../img/linha-folha.png" alt=""></div>

            <section class="section-separacao-collums">

                <div class="container-produtividade">

                    <div class="conteudo-produtividade">
                        <h2 class="titulo-home-page-info">Segurança</h2>
                        <p>Nossa segurança é uma prioridade absoluta e permeia todas as nossas operações. Implementamos rigorosos protocolos de segurança para garantir um ambiente de trabalho seguro para todos os nossos funcionários.</p>
                    </div>

                    <img class="tmnh-imagem-colheita" src="../img/segurança-harvest.png" alt="Imagem de trator colhendo">

                    
                </div>

                
            </section>

            <div class="alinhamento-linha"><img class="height-linha-folha" src="../img/linha-folha.png" alt=""></div>

            <section class="section-separacao-collums">

                <div class="container-produtividade">

                    <img class="tmnh-imagem-colheita" src="../img/qualidade-harvest.jpg" alt="Imagem de trator colhendo">

                    <div class="conteudo-produtividade">
                        <h2 class="titulo-home-page-info">Qualidade</h2>
                        <p>Implementamos rigorosos controles de qualidade em todas as etapas do processo de produção, desde a seleção das sementes até a colheita e distribuição. Utilizamos técnicas agrícolas avançadas e práticas sustentáveis para garantir que nossos produtos atendam aos mais altos padrões de qualidade.</p>
                    </div>

                </div>

                
            </section>

        </main>


        <script src="../javascript/main.js"></script>
    </body>
</html>
