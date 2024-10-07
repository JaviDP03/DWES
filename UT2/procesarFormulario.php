<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
        <?php
        if (!isset($_GET['submit'])) {
        ?>
        <form method="GET">
            <p>Código: <input name="codigo"></p>
            <p><input type="submit" name="submit"></p>
        </form>
        <?php
        } else {
            print_r($_GET);
        }
        ?>
    </pre>
</body>

</html>