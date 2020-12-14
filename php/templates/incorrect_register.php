<?php

function create_incorrect_register_content($user_exists)
{
    return $user_exists ? '<p class="error">ISTNIEJE KONTO O DANYM ADRESIE EMAIL</p>'
                        : '<p class="error">PODANO NIEPOPRAWNE DANE PODCZAS REJESTRACJI</p>';
}
