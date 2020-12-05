<?php

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
    include 'templates/main.php';
    echo (create_main_content());
}

function insert_login_content()
{
    include 'templates/login.php';
    echo (create_login_content());
}

function insert_after_login_content()
{
    include 'logic.php';

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    if (is_login_valid($email, $password)) {
        include 'templates/client_panel.php';
        echo (create_client_panel_content($email));
    } else {
        include 'templates/incorrect_login.php';
        echo (create_incorrect_login_content());
    }
}

function insert_projects_list_content()
{
    include 'templates/projects_list.php';
    echo (create_projects_list_content());
}

function insert_project_form_content()
{
    include 'templates/project_form.php';
    $project_request = isset($_GET["project"]) ? $_GET["project"] : "";
    echo (create_project_form_content($project_request));
}

function insert_project_summary_content()
{
    include 'logic.php';
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
