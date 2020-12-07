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
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <script src=""></script>
</head>

<body>
    <?php
    include 'php/inserter.php';
    $page_request = isset($_GET["page"]) ? $_GET["page"] : "";
    print_page($page_request);
    ?>
</body>

</html>