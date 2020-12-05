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
    insert_header();
    switch ($page_request) {
        case "login":
            insert_login_content();
            break;
        case "login_form":
            insert_after_login_content();
            break;
        case "app_list":
            insert_projects_list_content();
            break;
        case "app":
            insert_project_form_content();
            break;
        case "project_form_summary":
            insert_project_summary_content();
            break;
        default:
            insert_main_content();
            break;
    }
    insert_footer();
    ?>
</body>

</html>