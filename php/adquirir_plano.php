<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario_nome = $_SESSION['usuario']; // Nome do usuário da sessão

// Busca o saldo do usuário e o plano ativo (se houver)
$sql_usuario = "SELECT * FROM planos WHERE nome_usuario = '$usuario_nome' AND ativo = 1 LIMIT 1";
$result_usuario = $conexao->query($sql_usuario);
$usuario = $result_usuario->fetch_assoc();

$dinheiro_disponivel = $usuario ? $usuario['dinheiro_disponivel'] : 0; // Dinheiro disponível
$plano_ativo = $usuario ? $usuario['plano_id'] : null; // Plano ativo (se houver)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['essencial'])) {
        $plano_id = 1;
        $preco = 59.90;
    } elseif (isset($_POST['avancado'])) {
        $plano_id = 2;
        $preco = 79.90;
    } elseif (isset($_POST['premium'])) {
        $plano_id = 3;
        $preco = 99.90;
    }

    // Verifica se o usuário já possui um plano ativo
    if ($plano_ativo) {
        echo "<script>alert('Você já possui um plano ativo.');</script>";
    } else {
        // Verifica se o usuário tem dinheiro suficiente para adquirir o plano
        if ($dinheiro_disponivel >= $preco) {
            // Insere o novo plano para o usuário
            $sql_adquirir_plano = "INSERT INTO planos (nome_usuario, dinheiro_disponivel, plano_id, preco, ativo) 
                                   VALUES ('$usuario_nome', '$dinheiro_disponivel', '$plano_id', '$preco', 1)";
            if ($conexao->query($sql_adquirir_plano) === TRUE) {
                // Subtrai o valor do dinheiro disponível do usuário
                $novo_dinheiro = $dinheiro_disponivel - $preco;
                $sql_atualizar_saldo = "UPDATE planos SET dinheiro_disponivel = '$novo_dinheiro' WHERE nome_usuario = '$usuario_nome' AND ativo = 0";
                if ($conexao->query($sql_atualizar_saldo) === TRUE) {
                    // Redireciona de volta para a página de planos após a aquisição
                    header('Location: planos.php');
                    exit;
                } else {
                    echo "<script>alert('Erro ao atualizar o saldo. Tente novamente.');</script>";
                }
            } else {
                echo "<script>alert('Erro ao processar a aquisição do plano. Tente novamente.');</script>";
            }
        } else {
            echo "<script>alert('Você não tem dinheiro suficiente para adquirir este plano.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planos - Harvest Inc</title>
    <link rel="stylesheet" href="../css/style.css">
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
        <section class="background_section">
            <div class="transparet_background">
                <div class="first_section">
                    <h1 class="line-below">Serviços</h1>
                </div>
            </div>
        </section>

        <div id="proxima-secao"></div>

        <h2 class="escrita-titulo-planos">Planos disponíveis</h2>
        <div class="alinhamento-cards-planos">
            <!-- Exibição dos planos disponíveis -->
            <div class="cards-planos">
                <h3>Plano Essencial</h3>
                <p class="tamanho-preco">59,90</p>
                <?php
                    // Verifica se o usuário já adquiriu o plano
                    $plano_essencial_adquirido = false;
                    if ($plano_ativo == 1) {
                        $plano_essencial_adquirido = true;
                    }

                    if ($plano_essencial_adquirido) {
                        echo '<span class="icon-certo">✔️</span>';
                    } else {
                        echo '<form class="alinhamento-btn-adquirir" action="adquirir.php" method="POST">
                                <button name="essencial" class="botao-adquirir">Adquirir</button>
                              </form>';
                    }
                ?>
            </div>

            <div class="cards-planos">
                <h3>Plano Avançado</h3>
                <p class="tamanho-preco">79,90</p>
                <?php
                    $plano_avancado_adquirido = false;
                    if ($plano_ativo == 2) {
                        $plano_avancado_adquirido = true;
                    }

                    if ($plano_avancado_adquirido) {
                        echo '<span class="icon-certo">✔️</span>';
                    } else {
                        echo '<form class="alinhamento-btn-adquirir" action="adquirir.php" method="POST">
                                <button name="avancado" class="botao-adquirir">Adquirir</button>
                              </form>';
                    }
                ?>
            </div>

            <div class="cards-planos">
                <h3>Plano Premium</h3>
                <p class="tamanho-preco">99,90</p>
                <?php
                    $plano_premium_adquirido = false;
                    if ($plano_ativo == 3) {
                        $plano_premium_adquirido = true;
                    }

                    if ($plano_premium_adquirido) {
                        echo '<span class="icon-certo">✔️</span>';
                    } else {
                        echo '<form class="alinhamento-btn-adquirir" action="adquirir.php" method="POST">
                                <button name="premium" class="botao-adquirir">Adquirir</button>
                              </form>';
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>
