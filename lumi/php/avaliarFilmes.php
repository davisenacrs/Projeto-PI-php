<?php
include 'db.php'; // Inclui a conexão com o banco
session_start(); // Inicia a sessão para acesso ao usuário logado

// Verifica se o ID do filme foi passado pela URL
if (!isset($_GET['id'])) {
    echo "<p>ID do filme não especificado. Por favor, selecione um filme para avaliar.</p>";
    exit;
}

// Verifica se o usuário está logado e o ID do usuário está na sessão
if (!isset($_SESSION['usuario_id'])) {
    echo "<p>Usuário não especificado. Por favor, faça login para avaliar o filme.</p>";
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}

$id_filme = $_GET['id'];
$usuario_id = $_SESSION['usuario_id']; // Obtém o ID do usuário logado

// Consulta para obter as informações do filme
$sql = "SELECT titulo, descricao, data_lancamento, poster FROM filmes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_filme]);
$filme = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o filme foi encontrado
if (!$filme) {
    echo "<p>Filme não encontrado.</p>";
    exit;
}

// Processa o formulário de avaliação quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentario = $_POST['comentario'];
    $nota = $_POST['nota'];

    // Insere a avaliação no banco com o ID do usuário
    $sql_insert = "INSERT INTO avaliacoes (filmes_id, usuario_id, comentario, avaliacao) VALUES (?, ?, ?, ?)";
    $stmt_insert = $pdo->prepare($sql_insert);
    $stmt_insert->execute([$id_filme, $usuario_id, $comentario, $nota]);

    echo "<p>Avaliação adicionada com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliação de <?php echo htmlspecialchars($filme['titulo']); ?></title>
</head>
<body>
    <h1>Avaliação de <?php echo htmlspecialchars($filme['titulo']); ?></h1>
    <div>
        <img src="<?php echo htmlspecialchars($filme['poster']); ?>" alt="Poster de <?php echo htmlspecialchars($filme['titulo']); ?>" class="poster">
        <p><?php echo htmlspecialchars($filme['descricao']); ?></p>
        <p><strong>Data de Lançamento:</strong> <?php echo date("d/m/Y", strtotime($filme['data_lancamento'])); ?></p>
    </div>

    <h2>Deixe sua avaliação</h2>
    <form action="" method="POST">
        <label for="comentario">Comentário:</label><br>
        <textarea name="comentario" id="comentario" required></textarea><br><br>

        <label for="nota">Nota:</label>
        <select name="nota" id="nota" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <button type="submit">Enviar Avaliação</button>
    </form>
</body>
</html>
