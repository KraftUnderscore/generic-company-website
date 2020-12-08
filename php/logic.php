<?php

function is_email_valid($email)
{
    return preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $email);
}

function is_password_valid($password)
{
    return strlen($password) > 0;
}

//extend when database is ready
function is_login_valid($email, $password)
{
    return is_email_valid($email) && is_password_valid($password);
}

function activate_session()
{
    return session_start();
}

function is_logged_in()
{
    return isset($_SESSION['isAuthorized'])?$_SESSION['isAuthorized']: False;
}

function is_date_valid($d_1, $d_2)
{
    if ($d_1 > $d_2) {
        return False;
    } elseif (intval(date_diff($d_1, $d_2)->format('%a')) < 31) {
        return False;
    } else {
        return True;
    }
}
function change_theme(){
    $theme = isset($_COOKIE['theme'])? $_COOKIE['theme']:'sun';
    if($theme == 'sun')
        setcookie('theme','moon');
    else
        setcookie('theme','sun');
    redirect();
}

function redirect(){
    $page_query = isset($_GET["page"])?"?page=".$_GET["page"] :"";
    $page_query = ($page_query == "?page=login")? "":$page_query;
    $project_query = isset($_GET["project"])?"&project=".$_GET["project"] :"";
    header("Location: /piekarnia".$page_query.$project_query);
}
//extend if more form validation is present
function is_form_valid($d_1, $d_2)
{
    return is_date_valid($d_1, $d_2);
}

function extract_extras($extras_array)
{
    $extras = "";
    if (empty($extras_array)) {
        $extras .= ("<p>No additional premium package has been chosen</p>");
    } else {
        for ($i = 0; $i < count($extras_array); $i++) {
            $extras .= ("<p>" . $extras_array[$i] . "</p>");
        }
    }
    return $extras;
}
