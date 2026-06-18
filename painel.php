<?php
session_start();

// Se não existir a sessão, manda de volta para o login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

echo "Bem-vindo ao painel secreto!";
echo "<br><a href='logout.php'>Sair</a>";
?>