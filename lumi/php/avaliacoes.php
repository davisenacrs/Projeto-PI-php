<?php
include 'db.php'; // Inclui a conexão com o banco
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo "<p>Usuário não especificado. Por favor, faça login para ver suas avaliações.</p>";
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}

$usuario_id = $_SESSION['usuario_id']; // Obtém o ID do usuário logado

// Consulta para obter as avaliações do usuário para filmes e séries
$sql = "
    SELECT 
        a.avaliacao, 
        a.comentario, 
        f.titulo AS titulo_filme, 
        s.titulo AS titulo_serie, 
        u.nome 
    FROM avaliacoes a 
    LEFT JOIN filmes f ON a.filmes_id = f.id 
    LEFT JOIN series s ON a.series_id = s.id 
    JOIN usuarios u ON a.usuario_id = u.id 
    WHERE a.usuario_id = ?
";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario_id]);
$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verifica se o usuário possui avaliações
if (empty($avaliacoes)) {
    echo "<p>Você ainda não avaliou nenhum filme ou série.</p>";
} else {
    echo "<h1>Minhas Avaliações</h1>";
    foreach ($avaliacoes as $avaliacao) {
        echo "<div>";
        if (!empty($avaliacao['titulo_filme'])) {
            echo "<h2>" . htmlspecialchars($avaliacao['titulo_filme']) . "</h2>";
            echo "<p><strong>Avaliação:</strong> " . htmlspecialchars($avaliacao['avaliacao']) . "/5</p>";
            echo "<p><strong>Comentário:</strong> " . htmlspecialchars($avaliacao['comentario']) . "</p>";
            echo "<p><strong>Avaliador:</strong> " . htmlspecialchars($avaliacao['nome']) . "</p>";
        } elseif (!empty($avaliacao['titulo_serie'])) {
            echo "<h2>" . htmlspecialchars($avaliacao['titulo_serie']) . "</h2>";
            echo "<p><strong>Avaliação:</strong> " . htmlspecialchars($avaliacao['avaliacao']) . "/5</p>";
            echo "<p><strong>Comentário:</strong> " . htmlspecialchars($avaliacao['comentario']) . "</p>";
            echo "<p><strong>Avaliador:</strong> " . htmlspecialchars($avaliacao['nome']) . "</p>";
        }
        echo "</div><hr>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Avaliações</title>
</head>
<body>
    <!-- O conteúdo das avaliações já foi exibido acima -->
</body>
</html>
