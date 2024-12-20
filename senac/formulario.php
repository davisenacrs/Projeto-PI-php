<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>

<header>
    <h1>Senac Tech</h1>
</header>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="cursos.php">Cursos</a></li>
        <li><a href="formulario.php">Cadastro</a></li>
        <li><a href="localizacao.php">Localização</a></li>
    </ul>
</nav>

<div class="container">
    <h2>Formulário de Cadastro</h2>
    <br></br>
    <form action="cadastrar.php" method="POST">
        <div class="coluna1">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required><br>

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome" required><br>

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" required><br>

            <label for="numero">Número:</label>
            <input type="text" name="numero" id="numero" required><br>

            <label for="complemento">Complemento:</label>
            <input type="text" name="complemento" id="complemento"><br>

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro" required><br>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" required><br>
        </div>
        <div class="coluna2">
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" maxlength="2" required><br>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" required><br>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" required><br>

            <label for="rg">RG:</label>
            <input type="text" name="rg" id="rg" required><br>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <button type="submit">Cadastrar</button>
        </div>
    </form>
    <img src="img/senac_logo.png" alt="Logo Senac Tech" class="logo-imagem">
    </div>

<footer>
    <p>Senac Tech © 2024 - Todos os direitos reservados.</p>
</footer>

</body>
</html>
