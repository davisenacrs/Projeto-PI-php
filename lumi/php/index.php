
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" type="image/png" href="..img/logo.png">
    <title>Home - LUMI</title>
    <style>
        /* Estilo para ocultar o texto por padrão */
        #conteudo-oculto {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <div class="lumi">
                <h3>Lumi</h3>
            </div>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <h1>Bem Vindo ao LUMI:</h1>
        <h2>Light Up My Imagination</h2>
    </div>

    <div class="logoH">
        <img src="../img/logo.png" alt="Logo Lumi" class="logo-imagem">
    </div>

    <!-- Div oculta que será mostrada após o clique -->
    <div id="conteudo-oculto">
        <p>Descubra um mundo de entretenimento feito sob medida para você. No Lumi, você tem a oportunidade de explorar uma vasta seleção de filmes e séries, compartilhar suas opiniões, e receber recomendações personalizadas baseadas nas suas preferências. Nossa plataforma reúne críticas de profissionais e da comunidade, ajudando você a decidir o que assistir em cada momento.</p>
        <p>Encontre informações detalhadas sobre o elenco, equipe e datas de lançamento das suas produções favoritas, crie listas personalizadas e conecte-se com outros cinéfilos. Seja para discutir os últimos lançamentos ou revisitar clássicos, o Lumi é a ferramenta essencial para quem ama o universo do cinema e da TV.</p>
        <p>Junte-se a nós e torne a sua experiência de assistir ainda mais envolvente!</p>
    </div>

    <footer>
        <p>Lumi © 2024 - Todos os direitos reservados.</p>
    </footer>
</div>

<script>
    // JavaScript para exibir o conteúdo oculto ao clicar na imagem
    document.querySelector('.logo-imagem').addEventListener('click', function() {
        var conteudoOculto = document.getElementById('conteudo-oculto');
        if (conteudoOculto.style.display === 'none' || conteudoOculto.style.display === '') {
            conteudoOculto.style.display = 'block';
        } else {
            conteudoOculto.style.display = 'none';
        }
    });
</script>
</body>
</html>
