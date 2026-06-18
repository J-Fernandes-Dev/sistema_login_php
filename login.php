<?php
session_start();
// Importa a conexão PDO
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    try {
        // 1. Preparar a query com um placeholder (:usuario)
        $stmt = $conn->prepare("SELECT id, senha FROM utilizadores WHERE usuario = :usuario");
        
        // 2. Substituir o placeholder pelo valor real de forma segura (Bind)
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        
        // 3. Executar a consulta
        $stmt->execute();

        // Verificar se encontrou o utilizador
        if ($stmt->rowCount() > 0) {
            // Vai buscar os dados como um array associativo
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verificar a senha encriptada
            if (password_verify($senha, $row['senha'])) {
                $_SESSION['usuario_id'] = $row['id'];
                header("Location: painel.php");
                exit();
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Utilizador não encontrado!";
        }

    } catch(PDOException $e) {
        echo "Erro no sistema: " . $e->getMessage();
    }
}
?>