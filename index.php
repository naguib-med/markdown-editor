<?php
require_once 'vendor/erusev/parsedown/Parsedown.php';

$markdownText = '';
$htmlOutput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $markdownText = $_POST['markdown'];
    $Parsedown = new Parsedown();
    $htmlOutput = $Parsedown->text($markdownText);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Éditeur de texte Markdown</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Éditeur de texte Markdown</h1>

        <form action="" method="post">
            <div class="editor">
                <label for="markdown">Saisissez votre texte en Markdown :</label>
                <textarea id="markdown" name="markdown" rows="10" placeholder="Tapez votre texte ici ...">
                    <?= htmlspecialchars($markdownText); ?>
                </textarea>
            </div>
            <button type="submit">Convertir en HTML</button>
        </form>
        <div class="preview">
            <h2>Apperçu HTML :</h2>
            <div class="output">
                <?= $htmlOutput; ?>
            </div>
        </div>
    </div>
</body>
</html>
