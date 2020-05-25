<?php
require_once(realpath(dirname(__FILE__)).'/../lib/MysqlDb.php');
abstract class AbstractModel {

    protected $conn;

    protected $tableName;

    protected $tableId;

    public function __construct(){
        $mysql = new MysqlDb();
        $this->conn = $mysql->connect();
    }

    public function getById($id) {
        $sql = "SELECT * FROM `$this->tableName` WHERE `$this->tableId` = '$id'";

        $result = $this->conn->query($sql);

        if($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } 
        }
        
        return null;
    }

}