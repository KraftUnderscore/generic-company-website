<?php

function print_page($page_request, $theme_request)
{

    include_once 'php/logic.php';
    if ($theme_request == 'change_theme')
        change_theme();

    $content = prepare_content($page_request);
    $header = prepare_header();
    $footer = prepare_footer();

    print($header);
    print($content);
    print($footer);
}

function prepare_content($page)
{
    switch ($page) {
        case "login":
            return prepare_login_content('');
            break;
        case "client_panel":
            return prepare_client_panel();
            break;
        case "login_form":
            return prepare_after_login_content();
            break;
        case "app_list":
            return prepare_projects_list_content();
            break;
        case "app":
            return prepare_project_form_content();
            break;
        case "project_form_summary":
            return prepare_project_summary_content();
            break;
        case "register":
            return prepare_register_content();
            break;
        case "after_register":
            return prepare_after_register_content();
            break;
        default:
            return prepare_main_content();
            break;
    }
}

function prepare_header()
{
    include_once 'logic.php';
    include 'templates/header.php';
    return create_header(is_logged_in());
}

function prepare_footer()
{
    include 'templates/footer.php';
    return create_footer();
}

function prepare_main_content()
{
    include 'templates/main.php';
    return create_main_content();
}

function prepare_login_content($after)
{
    include_once 'logic.php';
    include 'templates/login.php';
    if (is_logged_in()) {
        $_SESSION['isAuthorized'] = False;
        $_SESSION['login'] = '';
        return prepare_content("");
    } else {
        return create_login_content($after);
    }
}

function prepare_after_login_content()
{
    include_once 'logic.php';
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $after = isset($_GET["after"]) ? $_GET["after"] : "";
    $_GET["page"] = $after;

    if (is_logged_in()) {
        return prepare_content($after);
    } elseif (is_login_valid($email, $password)) {
        $_SESSION['isAuthorized'] = True;
        $_SESSION['login'] = explode('@', $email)[0];
        return prepare_content($after);
    } else {
        include 'templates/incorrect_login.php';
        return create_incorrect_login_content();
    }
}

function prepare_client_panel()
{
    include_once 'logic.php';
    include 'templates/client_panel.php';
    if (is_logged_in()) {
        $login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Smth went wrong!!';
        return create_client_panel_content($login);
    } else {
        return prepare_login_content('client_panel');
    }
}

function prepare_projects_list_content()
{
    include_once 'logic.php';
    include 'templates/projects_list.php';
    if (is_logged_in()) {
        $login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Smth went wrong!!';
        return create_projects_list_content($login);
    } else {
        return prepare_login_content('app_list');
    }
}

function prepare_project_form_content()
{
    include 'templates/project_form.php';
    $project_request = isset($_GET["project"]) ? $_GET["project"] : "";
    return create_project_form_content($project_request);
}

function prepare_project_summary_content()
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
    return create_project_summary_content($project, $start_date, $end_date, $description, $extras, $is_valid);
}

function prepare_register_content()
{
    include 'templates/register.php';
    return create_register_content();
}

function prepare_after_register_content()
{
    include_once 'logic.php';
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    if(is_email_valid($email) && is_password_valid($password))
    {
        include_once 'db_ops/db_connection.php';
        $login = explode('@', $email)[0];
        add_user($email, $login, $password);
        return prepare_after_login_content();
    }

    include 'templates/incorrect_register.php';
    return create_incorrect_register_content();
}
