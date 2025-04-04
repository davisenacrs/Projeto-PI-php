<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/series.css">
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <script src="../js/style.js" defer ></script>
    <title>Séries - LUMI</title>
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
        <li class="avaliacao"><a href="avaliacoes.php">Avaliações</a></li>
        <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php if (isset($_SESSION['user_id'])): ?> 
                <li class="logout"><a href="logout.php" class="btn-logout">Sair</a></li>
            <?php endif; ?>        
        </ul>
    </nav>

    <h2>Séries em destaque:</h2>
    
    <div class="series-container">
    <?php
    include 'db.php'; // Inclui a conexão com o banco

    // Consulta para obter as séries usando PDO
    $sql = "SELECT id, titulo, descricao, data_lancamento, poster FROM series";
    $stmt = $pdo->query($sql);

    // Verifica se há resultados e os exibe
    if ($stmt->rowCount() > 0) {
        $counter = 0; // Contador para controlar as quebras de linha
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Verifica se já é o 3º item e insere a quebra de linha
            if ($counter > 0 && $counter % 3 == 0) {
                echo "</div><div class='series-container'>"; // Fecha e reabre o contêiner a cada 3 séries
            }

            echo "<div class='serie-item'>";
            echo "<img src='../img/" . $row["poster"] . "' alt='Poster de " . $row["titulo"] . "' class='poster'>";
            echo "<h3>" . $row["titulo"] . "</h3>";
            echo "<p>" . $row["descricao"] . "</p>";
            echo "<p><strong>Data de Lançamento:</strong> " . date("d/m/Y", strtotime($row["data_lancamento"])) . "</p>";
            echo "<a href='avaliarSeries.php?id=" . $row["id"] . "'>Adicione uma avaliação</a>";
            echo "</div>";

            $counter++; // Incrementa o contador
        }
    } else {
        echo "<p>Nenhuma série encontrada.</p>";
    }
    ?>
</div>
 
<button class="btn-topo" id="btnTopo" title="Voltar ao topo">↑</button>
    </div>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
