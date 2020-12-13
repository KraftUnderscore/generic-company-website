<?php
include 'db_config.php';

function get_connetion()
{
    $connection = new mysqli(DB_CONF['servername'], DB_CONF['login'], DB_CONF['password'],
                             DB_CONF['db_name'], DB_CONF['port']);
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
        $result = $connection->query('SELECT password
                                      FROM users
                                      WHERE users.email="' . $user_mail . '"');
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['password'];
        }
    }
    return NULL;
}

function get_id($user_mail)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $result = $connection->query('SELECT id
                                      FROM users
                                      WHERE users.email="' . $user_mail . '"');
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        }
    }
    return NULL;
}

function get_id_from_login($user_login)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $result = $connection->query('SELECT id
                                      FROM users
                                      WHERE users.login="' . $user_login . '"');
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        }
    }
    return NULL;
}

function get_orders($user_login)
{
    $connection = get_connetion();
    $result_array = array();
    if ($connection != NULL) {
        $result = $connection->query('SELECT *
                                      FROM orders
                                      WHERE orders.usersid=' . get_id_from_login($user_login));
        while ($row = $result->fetch_assoc())
            array_push($result_array, $row);
        return $result_array;
    }
    return NULL;
}

function add_user($email, $login, $password)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $result = $connection->query('SELECT MAX(id) + 1 FROM users');
        $id = $result->fetch_row()[0];
        $sql = 'INSERT INTO `users` (`id`, `email`, `password`, `login`)
        VALUES (' . $id . ', ' . $email . ', ' 
        . hash('sha512', $password) . ', ' . $login . ')';
        $connection->query($sql);
        return $sql;
    }
}
