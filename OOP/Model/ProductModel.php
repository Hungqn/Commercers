<?php
require_once(realpath(dirname(__FILE__)).'/AbstractModel.php');
class ProductModel extends AbstractModel {

    public function __construct(){
        $this->tableName = 'product';
        $this->tableId = 'product_id';
        parent::__construct();
    }

    public function getCollection() {
        $sql = "SELECT * FROM `product`";

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