<?php
include 'db_config.php';

function get_connetion()
{
    try {
        $connection = new PDO('mysql:host=' . DB_CONF["servername"] . ';dbname=' . DB_CONF["db_name"] . ';port=' . DB_CONF["port"], DB_CONF['login'], DB_CONF['password']);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return NULL;
    }
}

function get_password($user_mail)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $statement = $connection->prepare('SELECT password FROM users WHERE users.email="' . $user_mail . '"');
        $statement->execute();
        $row = $statement->fetch();
        return $row['password'];
    } else {
        return NULL;
    }
}

function get_id($user_mail)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $statement = $connection->prepare('SELECT id FROM users WHERE users.email="' . $user_mail . '"');
        $statement->execute();
        $row = $statement->fetch();
        return $row['id'];
    } else {
        return NULL;
    }
}

function get_id_from_login($user_login)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $statement = $connection->prepare('SELECT id FROM users WHERE users.login="' . $user_login . '"');
        $statement->execute();
        $row = $statement->fetch();
        return $row['id'];
    } else {
        return NULL;
    }
}
function get_orders($user_login)
{
    $connection = get_connetion();
    if ($connection != NULL) {
        $statement = $connection->prepare('SELECT * FROM orders WHERE orders.usersid=' . get_id_from_login($user_login));
        $statement->execute();
        return $statement->fetchAll();
    } else
        return NULL;
}
