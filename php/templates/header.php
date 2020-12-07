<?php

function create_header($is_logged_in)
{
    $login_button = $is_logged_in ? '<a href="index.php?page=login">Wyloguj</a>'
                                  : '<a href="index.php?page=login">Zaloguj</a>';
    return '
        <header>
            <h1>Piekarnia Oprogramowania</h1>

            <nav class="navbar">
                <a href="index.php">O nas</a>
                <a href="index.php?page=app_list">Nasze wypieki</a>
                <a href="index.php?page=client_panel">Panel klienta</a>' .
                $login_button . '</nav>
        </header>';
}
