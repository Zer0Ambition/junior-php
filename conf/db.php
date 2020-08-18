<?php

/**
 * Data base class
 */

class DB {

    const USER = "root";
    const PASS = "root";
    const HOST = "localhost";
    const DB = "junior_php";

    public static function connectToDB() {

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $connection = new PDO("mysql:dbname=$db;host=$host", $user, $pass);

        return $connection;
    }

}