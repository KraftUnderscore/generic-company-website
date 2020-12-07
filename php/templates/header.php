<?php

function create_header()
{
    return '
        <header>
            <h1>Piekarnia Oprogramowania</h1>

            <nav class="navbar">
                <a href="index.php">O nas</a>
                <a href="index.php?page=app_list">Nasze wypieki</a>
                <a href="index.php?page=client_panel">Panel klienta</a>
                <a href="index.php?page=login">Logowanie</a>
            </nav>
        </header>';
}
