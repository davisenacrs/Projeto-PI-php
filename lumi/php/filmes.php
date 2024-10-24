<?php
session_start(); // Inicie a sessão

// Incluir o arquivo de conexão com o banco de dados
include 'conexao.php'; // Substitua pelo caminho correto se necessário

// Função para buscar filmes da API
function buscarFilmes($url) {
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// Chave da API e URL de filmes populares
$apiKey = '2dc33676753e5a083c82a7add5d29a06';
$pagina = isset($_GET['page']) ? intval($_GET['page']) : 1;  // Página de filmes
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'popular'; // Categoria a partir da URL

$apiUrl = 'https://api.themoviedb.org/3/movie/' . $categoria . '?api_key=' . $apiKey . '&language=pt-BR&page=' . $pagina;

// Buscar os filmes
$filmes = buscarFilmes($apiUrl);

// Inserir os filmes no banco de dados
if (!empty($filmes['results'])) {
    foreach ($filmes['results'] as $filme) {
        $id = $filme['id'];
        $titulo = $conn->real_escape_string($filme['title']);
        $descricao = $conn->real_escape_string($filme['overview']);
        $data_lancamento = $filme['release_date'];
        $caminho_poster = $conn->real_escape_string($filme['poster_path']);

        // Verifica se o filme já está no banco de dados para evitar duplicatas
        $check_sql = "SELECT id FROM filmes WHERE id = $id";
        $result = $conn->query($check_sql);

        if ($result->num_rows == 0) {
            // Insere o filme na tabela se ele não existir
            $sql = "INSERT INTO filmes (id, titulo, descricao, data_lancamento, poster) 
                    VALUES ($id, '$titulo', '$descricao', '$data_lancamento', '$caminho_poster')";

            if ($conn->query($sql) === TRUE) {
                echo "Filme inserido com sucesso: " . $titulo . "<br>";
            } else {
                echo "Erro ao inserir filme: " . $conn->error . "<br>";
            }
        }
        //testte pode apagar
    }
} else {
    echo "Nenhum filme encontrado.";
}

// Processar avaliação se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['avaliacao'])) {
    $usuario_id = $_SESSION['user_id']; // ID do usuário autenticado
    $filme_id = intval($_POST['filme_id']);
    $avaliacao = intval($_POST['avaliacao']);
    $comentario = $conn->real_escape_string($_POST['comentario']);

    // Inserir a avaliação no banco de dados
    $sql = "INSERT INTO avaliacoes (filme_id, usuario_id, avaliacao, comentario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $filme_id, $usuario_id, $avaliacao, $comentario);

    if ($stmt->execute()) {
        // Avaliação cadastrada com sucesso
        echo "<script>alert('Avaliação enviada com sucesso!');</script>";
    } else {
        echo "Erro ao enviar a avaliação: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/filmes.css">
    <link rel="stylesheet" href="../css/logout.css">
    <title>Filmes - LUMI</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Light Up My Imagination</h1>
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </header>

    <nav>
        <ul>
            <li class="home"><a href="home.php">Home</a></li>
            <li class="filmes"><a href="filmes.php">Filmes</a></li>
            <li class="series"><a href="series.php">Séries</a></li>
            <?php if (isset($_SESSION['user_id'])): ?> 
                <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php endif; ?>        
        </ul>
    </nav>

    <h2>Filmes em Destaque:</h2>

    <div class="filmes-container">
        <?php if (!empty($filmes['results'])): ?>
            <?php foreach ($filmes['results'] as $filme): ?>
                <div class="filme">
                    <h3><?php echo htmlspecialchars($filme['title']); ?></h3>
                    <img src="https://image.tmdb.org/t/p/w500<?php echo $filme['poster_path']; ?>" alt="<?php echo htmlspecialchars($filme['title']); ?>">
                    <p>Data de Lançamento: <?php echo htmlspecialchars($filme['release_date']); ?></p>
                    <p><?php echo htmlspecialchars($filme['overview']); ?></p>

                    <!-- Formulário para avaliação -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <form method="POST">
                            <input type="hidden" name="filme_id" value="<?php echo $filme['id']; ?>">
                            <label>Avaliação:</label>
                            <select name="avaliacao" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label>Comentário:</label>
                            <textarea name="comentario" rows="3" placeholder="Deixe seu comentário..."></textarea>
                            <button type="submit">Avaliar</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum filme encontrado.</p>
        <?php endif; ?>
    </div>

    <!-- Navegação para outras páginas -->
    <div class="pagination">
        <a href="?categoria=<?php echo $categoria; ?>&page=<?php echo max(1, $pagina - 1); ?>">Anterior</a>
        <span>Página <?php echo $pagina; ?></span>
        <a href="?categoria=<?php echo $categoria; ?>&page=<?php echo $pagina + 1; ?>">Próxima</a>
    </div>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
