<?php 
require '../config.php';
require '../src/Artigo.php';

$artigo = new Artigo($mysql);
if(isset($_GET['id'])) {
    $actualArquivo = $artigo->exibirUm($_GET['id']);
} 


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $artigo->editarArquivo($_POST['titulo'], $_POST['conteudo'], $_POST['id']);

    header('Location: index.php');
    die();
}


?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Edite o titulo do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $actualArquivo['titulo']; ?>" />
                
            </p>
            <p>
                <label for="conteudo">Edite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?php echo $actualArquivo['conteudo']; ?></textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>