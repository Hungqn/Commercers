<?php
require_once(realpath(dirname(__FILE__)).'/AbstractModel.php');
class CustomerModel extends AbstractModel {

    public function __construct(){
        $this->tableName = 'customer';
        $this->tableId = 'customer_id';
        parent::__construct();
    }

    public function create($data){
        $sql = "INSERT INTO `customer` (name,email, password) VALUES ('".$data['name']."','".$data['email']."','".$data['password']."')";

        if ($this->conn->query($sql) === true) {
            return true;
        } else {
            throw new Exception("Error: " . $sql . " - " . $conn->error);
        }
    }

    public function checkEmailExist($email){
        $sql = "SELECT * FROM `customer` WHERE `email` = '$email'";

        $result = $this->conn->query($sql);

        if($result) {
            if ($result->num_rows > 0) {
                return true;
            } 
        }

        return false;
    }

    public function getBuyOrder($customerId) {
        $sql = "SELECT * FROM `order` WHERE `customer_id` = '$customerId'";

        $result = $this->conn->query($sql);

        if($result) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $row;
            } 
        }
        
        return null;
    }
}