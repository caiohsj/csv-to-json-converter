<?php
    if (isset($_FILES['file'])) {
        require('src/Converter.php');
        $converter = new Converter();
        echo $converter->toJson($_FILES['file']);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV to JSON</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" value="Converter">
    </form>
</body>
</html>