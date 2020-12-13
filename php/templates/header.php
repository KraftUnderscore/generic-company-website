<?php

function create_header($is_logged_in)
{
    $login_button = $is_logged_in ? '<a href="index.php?page=login">Wyloguj</a>'
                                  : '<a href="index.php?page=login">Zaloguj</a><a href="index.php?page=register>Rejestracja</a>';
    
    $page_query = isset($_GET["page"])?"page=".$_GET["page"] . "&":"";
    $page_query = ($page_query == "page=login")? "" : $page_query;

    $project_query = isset($_GET["project"])?"&project=".$_GET["project"] :"";

    $image_asset = isset($_COOKIE["theme"])?$_COOKIE["theme"]:'sun';
    return '
        <header>
            <h1>Piekarnia Oprogramowania</h1>

            <nav class="navbar">
                <a href="index.php">O nas</a>
                <a href="index.php?page=app_list">Nasze wypieki</a>
                <a href="index.php?page=client_panel">Panel klienta</a>' .
                $login_button . '
                <a href="?'.$page_query.'theme=change_theme'.$project_query.'"><img src="assets/'.$image_asset.'.png" alt="'.$image_asset.'" width="20px" height="20px"></a></nav>
        </header>';
}
