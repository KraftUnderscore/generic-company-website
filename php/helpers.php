<?php
function place_login_form_page()
{
    include 'php/logic.php';
    include_once 'php/templates.php';

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    if (is_login_valid($email, $password))
        echo (generate_client_panel_content($email));
    else
        echo ($incorrect_login_page_content);
}

function place_app_form_page()
{
    $project_request = isset($_GET["project"]) ? $_GET["project"] : "";
    echo (generate_projects_form_content($project_request));
}

function place_app_summary_page()
{
    include 'php/logic.php';
    $project = isset($_POST["app_kind"]) ? $_POST["app_kind"] : "";
    $start_date = $_POST['project_start'];
    $end_date = $_POST['project_end'];
    $is_valid = is_date_valid(date_create($start_date), date_create($end_date));
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $extras_array = isset($_POST["formExtra"]) ? $_POST["formExtra"] : array();
    $extras = extract_extras($extras_array);
    echo (generate_form_summary_content($project, $start_date, $end_date, $description, $extras, $is_valid));
}
