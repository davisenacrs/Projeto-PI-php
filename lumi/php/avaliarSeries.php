<?php
include 'db.php'; // Inclui a conexão com o banco
session_start(); // Inicia a sessão para acesso ao usuário logado

// Verifica se o ID da série foi passado pela URL
if (!isset($_GET['id'])) {
    echo "<p>ID da série não especificado. Por favor, selecione uma série para avaliar.</p>";
    exit;
}

// Verifica se o usuário está logado e o ID do usuário está na sessão
if (!isset($_SESSION['usuario_id'])) {
    echo "<p>Usuário não especificado. Por favor, faça login para avaliar a série.</p>";
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}

$id_serie = $_GET['id']; // Muda a variável para id_serie
$usuario_id = $_SESSION['usuario_id']; // Obtém o ID do usuário logado

// Consulta para obter as informações da série
$sql = "SELECT titulo, descricao, data_lancamento, poster FROM series WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_serie]);
$serie = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se a série foi encontrada
if (!$serie) {
    echo "<p>Série não encontrada.</p>";
    exit;
}

// Processa o formulário de avaliação quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentario = $_POST['comentario'];
    $nota = $_POST['nota'];

    // Insere a avaliação no banco com o ID do usuário
    $sql_insert = "INSERT INTO avaliacoes (series_id, usuario_id, comentario, avaliacao) VALUES (?, ?, ?, ?)"; // Muda a coluna para series_id
    $stmt_insert = $pdo->prepare($sql_insert);
    $stmt_insert->execute([$id_serie, $usuario_id, $comentario, $nota]);

    echo "<p>Avaliação adicionada com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliação de <?php echo htmlspecialchars($serie['titulo']); ?></title>
</head>
<body>
    <h1>Avaliação de <?php echo htmlspecialchars($serie['titulo']); ?></h1>
    <div>
        <img src="<?php echo htmlspecialchars($serie['poster']); ?>" alt="Poster de <?php echo htmlspecialchars($serie['titulo']); ?>" class="poster">
        <p><?php echo htmlspecialchars($serie['descricao']); ?></p>
        <p><strong>Data de Lançamento:</strong> <?php echo date("d/m/Y", strtotime($serie['data_lancamento'])); ?></p>
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
