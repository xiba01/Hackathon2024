<?php
try {
    $host = "#";
    $dbname = "#";
    $port = "#";
    $password = "#";
    $user = "#";
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::MYSQL_ATTR_SSL_CA => 'ca.pem',
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
    );
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password, $option);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), $e->getCode());
}
