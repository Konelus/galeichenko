<?php
    $pagesTemp = scandir($_SERVER['DOCUMENT_ROOT']."/styles");
    foreach ($pagesTemp as $key => $value)
    {
        if (($value != '.') && ($value != '..'))
        {
            list($num,$name,) = explode('.',$value);
            $pages[$num] = $name;
        }
    }
    ksort($pages);
?>

<!DOCTYPE html>

<html lang="ru">
    <head>
        <title>Уникальный мастер-класс Михаила Галейченко: Автоматизация и сверхеффективность</title>
        <meta charset = 'UTF-8'>
        <meta name = 'viewport' content="width=device-width, initial-scale=1.0">
        <meta name = 'description' content = 'Уникальный мастер-класс Михаила Галейченко о том как прокачать себя и бизнес без существенных вложений'>
        <meta name = 'keywords' content="мастер класс, тренинг, игорь манн, it фишки, гаджеты, галейченко, it прорыв, ит технологии">

        <script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src = '/dist/js/bootstrap.min.js'></script>
        <link rel = 'stylesheet' href = '/dist/css/bootstrap.min.css'>
        <link rel = 'stylesheet' href = '/style.css'>

        <?php foreach ($pages as $key => $value) { ?>
        <link rel = 'stylesheet/less' type = 'text/css' href = '/styles/<?= $key.'.'.$value ?>.less'>
        <?php } ?>

        <script src = 'https://cdn.jsdelivr.net/npm/less'></script>
    </head>
    <body>
    <?php
        if (isset ($_POST['reg']))
        {
            //require_once($_SERVER['DOCUMENT_ROOT'].'/pages/contactEngine.php');
            require_once ($_SERVER['DOCUMENT_ROOT']."/pages/modal.php");
        ?>
        <script>$("#modal").modal("show");</script>
        <?php
        }

        foreach ($pages as $key => $value)
        { require_once($_SERVER['DOCUMENT_ROOT']."/pages/{$key}.{$value}.html"); }
    ?>
    </body>
</html>