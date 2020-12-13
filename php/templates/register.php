<?php

function create_register_content()
{
    return '
        <div class="login">
            <h4>Rejestracja</h4>
            <form method="post" action="index.php?page=after_register">
                <p>
                    Adres email:
                    <input type="email" name="email">
                </p>
                <p>
                    Hasło:
                    <input type="password" name="password">
                </p>
                <p>
                    <input type="submit" name="submit" value="Zarejestruj">
                </p>
            </form>
        </div>';
}
