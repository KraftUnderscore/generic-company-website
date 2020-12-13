<?php

function create_client_panel_content($email)
{
    include_once 'php/db_ops/db_connection.php';
    $order_array = get_orders($email);
    $orders_html = '';

    foreach ($order_array as $order) {
        $orders_html .= '<li>
        <h4>' . $order['app_type'] . '</h4>
        <p>Status zamówienia:' . $order['status'] . '</p>
        <p>Data rozpoczęcia:' . $order['order_start'] . '    Planowana data zakończenia: ' . $order['order_end'] . '</p>
        </li>';
    }

    return '
        <h2>Witaj z powrotem, ' . $email . '!</h2>

        <div class="orders">
            <h3>Twoje zamówienia:</h3>
            <div>
                <ul>
                    ' . $orders_html . '
                </ul>
            </div>
        </div>
        ';
}
