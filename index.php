<!doctype html>
<html lang="pt-pt">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Página de Login</title>
  </head>
  <body>
    <div class="estrelas"></div>
    <div class="formulario">
      <h1>Login</h1>

      <form action="login.php" method="POST" >
        <div class="caixa-formulario">
          <input
            placeholder="Insira o seu nome de usuário"
            type="text"
            id="usuario"
            name="usuario"
            required
          />
          <i class="bx bxs-user"></i>
        </div>
        <div class="caixa-formulario">
          <input placeholder="Senha" type="password" name="senha" required/>
          <i class="bx bxs-lock-alt"></i>
        </div>

        <div class="caixa-lembrar-esqueci">
          <label>
            <input type="checkbox" />
            Lembrar 
          </label>
          <a href="recuperar.php">Esqueci a minha senha</a>
        </div>

        <button type="submit">Entrar</button>

        <div class="link-registo">
          <p>Não tem uma conta? <a href="registo.php">Registar</a></p>
        </div>
      </form>
    </div>
  </body>
</html>
