<?php

require 'config.php';

include 'src/Artigo.php';
$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
        
        <header>
            <nav class="cabecalho">
                <a id="home" href="#">HOME</a>
                <a id="botaoParaAdmin" href="admin/index.php">ADM</a>
            </nav>
        </header>

        <div class="containerPrincipal">
            <h2 class="titulo-portal">Artigos</h2>
            <?php if ($artigos != null) :
            foreach($artigos as $artigo) : ?> 
            <div class="containerArtigo">
                <a href="artigo.php?id=<?php echo $artigo['id']?> " class="titulo"><?php echo $artigo['titulo']; ?></a>
                <!-- <p class="titulo">Titulo</p> -->
                <p class="conteudo"><?php echo $artigo['conteudo']; ?> </p>
            </div>
                <?php endforeach; endif; ?>
        </div>
    
</body>

</html>