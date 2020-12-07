<?php

function insert_content($page)
{
    switch ($page) {
        case "login":
            insert_login_content('');
            break;
        case "client_panel":
            insert_client_panel();
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
}

function insert_header()
{
    include 'templates/header.php';
    echo (create_header());
}

function insert_footer()
{
    include 'templates/footer.php';
    echo (create_footer());
}

function insert_main_content()
{
    print(session_id());
    include 'templates/main.php';
    echo (create_main_content());
}

function insert_login_content($after)
{
    include 'templates/login.php';
    echo (create_login_content($after));
}

function insert_after_login_content()
{
    include_once 'logic.php';
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    if (is_login_valid($email, $password)) {
        activate_session();
        $_SESSION['isAuthorized'] = 'True';
        setcookie('login',$email);
        $after = isset($_GET["after"]) ? $_GET["after"] : "";
        insert_content($after);
    } else {
        include 'templates/incorrect_login.php';
        echo (create_incorrect_login_content());
    }
}

function insert_client_panel()
{
    include_once 'logic.php';
    include 'templates/client_panel.php';
    if (is_session_active()) {
        $email = isset($_COOKIE['login']) ? $_COOKIE['login']:'Smth went wrong!!'; //WZIĄĆ Z DANYCH SESJI
        echo (create_client_panel_content($email));
    } else {
        echo (insert_login_content('client_panel'));
    }
}

function insert_projects_list_content()
{
    include_once 'logic.php';
    include 'templates/projects_list.php';
    if (is_session_active()) {
        $email = isset($_COOKIE['login']) ? $_COOKIE['login']:'Smth went wrong!!'; //WZIĄĆ Z DANYCH SESJI
        echo (create_projects_list_content($email));
    } else {
        echo (insert_login_content('app_list'));
    }
}

function insert_project_form_content()
{
    include 'templates/project_form.php';
    $project_request = isset($_GET["project"]) ? $_GET["project"] : "";
    echo (create_project_form_content($project_request));
}

function insert_project_summary_content()
{
    include_once 'logic.php';
    include 'templates/project_summary.php';
    $project = isset($_POST["app_kind"]) ? $_POST["app_kind"] : "";
    $start_date = $_POST['project_start'];
    $end_date = $_POST['project_end'];
    $is_valid = is_date_valid(date_create($start_date), date_create($end_date));
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $extras_array = isset($_POST["formExtra"]) ? $_POST["formExtra"] : array();
    $extras = extract_extras($extras_array);
    echo (create_project_summary_content($project, $start_date, $end_date, $description, $extras, $is_valid));
}
