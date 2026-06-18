<?php
$host = "localhost:8889";
$db_name = "sistema_de_login-php";
$username = "root";
$password = "root";

try {
    // O PDO liga-se usando uma string DSN (Data Source Name)
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>