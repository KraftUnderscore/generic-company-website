<?php
const DB_CONF = array(
    'servername' => '172.26.160.1',
    'login' => 'root',
    'password' => 'password',
    'db_name' => 'piekarnia',
    'port' => '3306'
);

function get_connetion()
{

    $connection = new mysqli(DB_CONF['servername'], DB_CONF['login'], DB_CONF['password'], DB_CONF['db_name'], DB_CONF['port']);
    if ($connection->connect_errno) {
        echo "Failed to connect to MySQL: " . $connection->connect_error;
        exit();
    }
    return $connection;
}

function get_password($user_mail)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $result = $connection->query('SELECT password FROM users WHERE users.email="' . $user_mail . '"');
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['password'];
        } else
            return NULL;
    } else {
        return NULL;
    }
}

function get_id($user_mail)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $result = $connection->query('SELECT id FROM users WHERE users.email="' . $user_mail . '"');
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else
            return NULL;
    } else {
        return NULL;
    }
}

function get_id_from_login($user_login)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $result = $connection->query('SELECT id FROM users WHERE users.login="' . $user_login . '"');
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else
            return NULL;
    } else {
        return NULL;
    }
}

function get_orders($user_login)
{
    $connection = get_connetion();
    $result_array = array();
    if ($connection != NULL) {
        $result = $connection->query('SELECT * FROM orders WHERE orders.usersid=' . get_id_from_login($user_login));
        while( $row = $result->fetch_assoc())
            array_push($result_array, $row);
        return $result_array;
    } else
        return NULL;
}
