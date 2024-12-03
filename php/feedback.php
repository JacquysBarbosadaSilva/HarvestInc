<?php
    session_start();
    include 'conexao.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_SESSION['usuario']) || !isset($_SESSION['tipo'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $date = $_POST['date'] ?? null;
        $rating = $_POST['rating'] ?? null;

        if ($title && $description && $date && $rating) {
            $stmt = $conexao->prepare("INSERT INTO feedbacks (title, description, date, rating) VALUES (?, ?, ?, ?)");
            if ($stmt === false) {
                die("Erro ao preparar a consulta: " . $conexao->error);
            }

            $stmt->bind_param("sssi", $title, $description, $date, $rating);

            if ($stmt->execute()) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function(){
                        Swal.fire({
                            title: 'Feedback realizado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    });
                </script>";
            } else {
                echo "Erro ao enviar feedback: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Todos os campos são obrigatórios!";
        }
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
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <link href="https://fonts.googleapis.com/css2?family=Kavivanar&display=swap" rel="stylesheet">
        <script src="../javascript/feedback.js" defer></script>
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
                        
        <div class="titulo-feedback">
            <h1 class="line-below">Feedback</h1>
            <div class="linha2"></div>
            <p id="text-infor">Deixe aqui seu feedback para realizarmos melhorias!</p>
        </div>

        <div id="feedbackContainer" class="feedback-container">
            <?php
                // Consulta para buscar os feedbacks
                $query = "SELECT title, description, date, rating FROM feedbacks ORDER BY date DESC";
                $result = $conexao->query($query);


                if ($result && $result->num_rows > 0) {

                    while ($feedback = $result->fetch_assoc()) {
                        $stars = str_repeat('★', $feedback['rating']) . str_repeat('☆', 5 - $feedback['rating']);
                        echo "
                        <div class='feedback-card'>
                            <h3>{$feedback['title']}</h3>

                            <div class='linha2'></div>
                            <p class='espacamento-linhas'>{$feedback['description']}</p>
                            
                            <p class='separacao-cards-feedback'><strong>Data:</strong> {$feedback['date']}</p>
                            <p><strong>Nota:</strong> $stars</p>
                        </div>
                        ";
                    }
                } else {
                    echo "<p>Nenhum feedback encontrado.</p>";
                }
            ?>
        </div>


        <button class="feedback-btn" id="openModalBtn">Adicionar Feedback</button>



        <div id="feedbackModal" class="modal">
            <div class="modal-content">
                <span class="close-btn" id="closeModalBtn">&times;</span>

                <div class="titulo-modal-feedback">
                    <h2>Adicionar Feedback</h2>
                </div>
                
                <form action="" class="form-feedback" method="POST">

                    <div class="separacao">
                        <label for="title">Título:</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                        
                    <div class="separacao">
                        <label for="description">Descrição:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    
                    <div class="organizacao-modal">
                        <div class="separacao">
                            <label for="date">Data:</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                            
                        <div class="linha-vertical"></div>

                        <div class="separacao">
                            <label for="rating">Nota:</label>
                            <div class="stars">
                                <input type="radio" name="rating" id="star1" value="1" checked>
                                <label for="star1">&#9733;</label>
                                <input type="radio" name="rating" id="star2" value="2" checked>
                                <label for="star2">&#9733;</label>
                                <input type="radio" name="rating" id="star3" value="3" checked>
                                <label for="star3">&#9733;</label>
                                <input type="radio" name="rating" id="star4" value="4" checked>
                                <label for="star4">&#9733;</label>
                                <input type="radio" name="rating" id="star5" value="5" checked>
                                <label for="star5">&#9733;</label>
                            </div>
                        </div>
                    </div>
                
                    

                    <button type="submit" class="button-entrar">Enviar Feedback</button>
                </form>
            </div>
        </div>

        </main>

    </body>
</html>




