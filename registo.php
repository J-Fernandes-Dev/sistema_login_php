<?php
// Incluir a conexão que criámos antes
require_once 'conexao.php';

$mensagem = ""; // Variável para mostrar avisos no ecrã

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $senha = $_POST['senha'];

    // 1. Encriptar a senha de forma segura (usando o algoritmo padrão atual do PHP)
    $senha_encriptada = password_hash($senha, PASSWORD_DEFAULT);

    try {
        // 2. Verificar primeiro se o utilizador já existe para evitar duplicados
        $check = $conn->prepare("SELECT id FROM utilizadores WHERE usuario = :usuario");
        $check->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $check->execute();

        if ($check->rowCount() > 0) {
            $mensagem = "Este nome de utilizador já está em uso!";
        } else {
            // 3. Preparar o comando INSERT de forma segura com Prepared Statements
            $stmt = $conn->prepare("INSERT INTO utilizadores (usuario, senha) VALUES (:usuario, :senha)");
            
            // 4. Associar os valores reais aos placeholders
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha_encriptada, PDO::PARAM_STR);
            
            // 5. Executar a inserção
            if ($stmt->execute()) {
                $mensagem = "Utilizador registado com sucesso! Já pode fazer <a href='index.php'>login</a>.";
            } else {
                $mensagem = "Erro ao registar o utilizador.";
            }
        }
    } catch(PDOException $e) {
        $mensagem = "Erro no sistema: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
    </head>
<body>

    <div class="login-box">
        <h2>Criar Nova Conta</h2>
        
        <?php if(!empty($mensagem)): ?>
            <p class="aviso"><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form action="registo.php" method="POST">
            <input type="text" name="usuario" placeholder="Escolha um utilizador" required>
            <input type="password" name="senha" placeholder="Escolha uma senha" required>
            <button type="submit">Registar</button>
        </form>
        
        <p><a href="index.php">Voltar para o Login</a></p>
    </div>

</body>
</html>