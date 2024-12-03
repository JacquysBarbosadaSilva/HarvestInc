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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                                        <p class='button-login-logado'>Olá, " . $_SESSION['usuario'] . "!</p>
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
                <section class="background_section">
                    <div class="transparet_background">
                        <div class="first_section">
                            <h1 class="line-below">Serviços</h1>
                        </div>
                        
                    </div>
                </section>

                <div id="proxima-secao"></div>
                
                <div class="card-introducao-plano">

                    <div class="alinhamento-card-introducao-planos">
            
                        <div class="titulo-card-plano">
                            <h2 class="escrita-titulo">Adquira um plano</h2>
                        </div>

                        <div class="itens-introducao">
                            <img class="icon-planos" src="../img/icon-produtividade.png" alt=""> 
                            <p id="text-infor">Nossa empresa oferece soluções que elevam a produtividade por meio de tecnologia avançada e eficiente.Com nossas ferramentas, você maximiza resultados, alcançando um desempenho superior.</p>
                        </div>

                        <div class="linha"></div>

                        <div class="itens-introducao">
                            <img class="icon-planos" src="../img/icon-lucro.png" alt=""> 
                            <p id="text-infor">Aumenta seus lucros proporcionando praticidade e resultados concretos. Nossas soluções otimizam processos e garantem um retorno financeiro superior.</p>
                        </div>

                    </div>
                    
                </div>

                <button id="botao-scroll" class="botao-scroll" aria-label="Ir para a próxima seção">
                    <i class="fas fa-arrow-down"></i>
                </button>
                
                <div>

                    <h2 class="escrita-titulo-planos">Planos disponíveis</h2>

                    <div class="alinhamento-cards-planos">
                        
                        <div class="cards-planos">
                            <h3 >Plano Essencial</h3>
                            <p class="tamanho-preco">59,90</p>
                            
                            <div class="itens-planos">
                                <ul class="lista-planos">
                                    <li class="conteudo-planos-inicial">Monitoramento básico</li>
                                    <li class="conteudo-planos">Relatórios semanais de consumo de ração e insumos.</li>
                                    <li class="conteudo-planos">Sugestões de otimização simples com base em dados.</li>
                                    <li class="conteudo-planos">Alertas automáticos para reposição de insumos.</li>
                                    <li class="conteudo-planos">Suporte por e-mail.</li>
                                </ul>
                            </div>
                            
                        </div>

                        <div class="cards-planos">
                            <h3>Plano Avançado</h3>
                            <p class="tamanho-preco">79,90</p>

                            <div class="itens-planos">
                                <ul class="lista-planos">
                                    <li class="conteudo-planos-inicial">Monitoramento completo de produção e recursos.</li>
                                    <li class="conteudo-planos">Relatórios personalizados de produtividade com análises detalhadas.</li>
                                    <li class="conteudo-planos">Previsão e controle de consumo de ração e insumos.</li>
                                    <li class="conteudo-planos">Suporte via chat e e-mail.</li>
                                    <li class="conteudo-planos">Gestão estratégica com informações para decisões mais assertivas.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="cards-planos">
                            <h3>Plano Premium</h3>
                            <p class="tamanho-preco">99,90</p>

                            <div class="itens-planos">
                                <ul class="lista-planos">
                                    <li class="conteudo-planos-inicial">Monitoramento em tempo real de toda a cadeia produtiva.</li>
                                    <li class="conteudo-planos">Relatórios avançados com insights preditivos e recomendações detalhadas.</li>
                                    <li class="conteudo-planos">Suporte técnico e consultoria especializada.</li>
                                    <li class="conteudo-planos">Análise de dados e previsão de produção com indicadores de desempenho</li>
                                    <li class="conteudo-planos"> Maximização da eficiência, redução de custos e suporte total para decisões inteligentes e estratégicas.</li>
                                </ul>
                            </div>
                        </div>

                        
                    </div>

                    
                </div>
                
                
                
            </main>
            <footer></footer>
            
            
    </body>
</html>