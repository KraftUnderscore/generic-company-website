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
    include 'php/templates.php';
    $page_request = isset($_GET["page"]) ? $_GET["page"] : "";
    echo ($page_header);
    switch ($page_request) {
        case "login":
            echo ($login_page_content);
            break;
        case "login_form":
            include 'php/logic.php';

            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";

            if (is_login_valid($email, $password))
                echo (generate_client_panel_content($email));
            else
                echo ($incorrect_login_page_content);
            break;
        case "app_list":
            echo ($projects_list_page_content);
            break;
        case "app":
            $project_request = isset($_GET["project"]) ? $_GET["project"] : "";
            echo (generate_projects_form_content($project_request));
            break;
        case "project_form_summary":
            include 'php/logic.php';
            $project = isset($_POST["app_kind"]) ? $_POST["app_kind"] : "";
            $start_date = $_POST['project_start'];
            $end_date = $_POST['project_end'];
            $is_valid = is_date_valid(date_create($start_date), date_create($end_date));
            $description = isset($_POST["description"]) ? $_POST["description"] : "";
            $extras_array = isset($_POST["formExtra"]) ? $_POST["formExtra"] : array();
            $extras = extract_extras($extras_array);
            echo (generate_form_summary_content($project, $start_date, $end_date, $description, $extras, $is_valid));
            break;
        default:
            echo ($main_page_content);
            break;
    }
    echo ($page_footer);
    ?>
</body>

</html>