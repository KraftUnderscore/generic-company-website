<?php

function create_client_panel_content($email)
{
    return '
        <h2>Witaj z powrotem, ' . $email . '!</h2>

        <div class="orders">
            <h3>Twoje zamówienia:</h3>
            <div>
                <ul>
                    <li>
                        <h4>Zamówienie 1</h4>
                        <p>Status zamówienia: w trakcie przygotowania</p>
                        <p>Opis zamówienia</p>
                    </li>
                    <li>
                        <h4>Zamówienie 2</h4>
                        <p>Status zamówienia: gotowe</p>
                        <p>Opis zamówienia</p>
                    </li>
                    <li>
                        <h4>Zamówienie 3</h4>
                        <p>Status zamówienia: odebrano</p>
                        <p>Opis zamówienia</p>
                    </li>
                </ul>
            </div>
        </div>
        ';
}
