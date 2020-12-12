<?php

function set_style()
{
    $theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'sun';
    if ($theme == 'sun')
        echo ('    <link rel="stylesheet" type="text/css" href="styles/style.css">');
    else
        echo ('    <link rel="stylesheet" type="text/css" href="styles/moon.css">');
}
