# 🔐 Sistema de Login e Registo em PHP

Este é um sistema de autenticação seguro desenvolvido em PHP estruturado com PDO e MySQL, contando com uma interface moderna com efeitos de *Glassmorphism*.

## 🚀 Como testar este projeto localmente

Para testar este projeto no seu computador, siga os passos abaixo:

### 1. Pré-requisitos
Necessita de um servidor local como o **MAMP** ou **XAMPP** instalado.

### 2. Configuração da Base de Dados
1. Abra o **phpMyAdmin**.
2. Crie uma base de dados chamada `sistema_de_login_php`.
3. Clique na aba **Importar** e selecione o ficheiro `sistema_de_login_php.sql` que está na raiz deste projeto.

### 3. Ajustar as Credenciais
Se necessário, altere as configurações de acesso ao banco de dados no ficheiro `conexao.php`:
```php
$$host = "localhost:8889";
$db_name = "sistema_de_login_php";
$username = "O_TEU_UTILIZADOR";
$password = "A_TUA_PASSWORD";      // Altere para vazio "" se usar XAMPP
