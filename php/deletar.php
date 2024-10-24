<?php
    include 'conexao.php';
    $sql = "DELETE FROM usuarios WHERE id";
    
    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Usuario Deletado com sucesso')</script>";
        header('Location: ../index.php');

    } else {
        echo json_encode(['erro' => 'Erro ao deletar registro']);
    }
    
    $conexao->close();
?>