<?php

class MysqlDb {

    const DB_HOST = 'localhost';
    const DB_DATABASE = 'hungnguyen';
    const USER_NAME = 'root';
    const USER_PASSWORD = '';

    public function connect() {
        $conn = new mysqli(self::DB_HOST, self::USER_NAME, self::USER_PASSWORD, self::DB_DATABASE);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        } 

        return $conn;
    }

}
