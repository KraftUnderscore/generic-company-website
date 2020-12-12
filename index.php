<?php
if(session_id() == '')
    session_start()
?>

<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Main page of Piekarnia Oprogramowania software house">
    <meta name="keywords" content="softwarehouse, software, house, development, piekarnia, oprogramowania">
    <title>Piekarnia Oprogramowania</title>
    <?php
        include 'php/templates/style_setter.php';
        set_style();
    ?>

    <script src=""></script>
</head>

<body>
    <?php
    include 'php/inserter.php';
    $page_request = isset($_GET["page"]) ? $_GET["page"] : "";
    $theme_request = isset($_GET["theme"]) ? $_GET["theme"] : "";
    print_page($page_request, $theme_request);
    ?>
</body>

</html>