<?php

function create_login_content()
{
    return '
        <div class="login">
            <h4>Logowanie</h4>
            <form method="post" action="index.php?page=login_form">
                <p>
                    Login:
                    <input type="email" name="email">
                </p>
                <p>
                    Hasło:
                    <input type="password" name="password">
                </p>
                <p>
                    <input type="submit" name="submit" value="Zaloguj">
                </p>
            </form>
        </div>';
}
