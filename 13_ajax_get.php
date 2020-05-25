<?php
require_once('OOP/Model/ProductModel.php');

$id = $_POST['id'];

$productModel = new ProductModel();

echo json_encode($productModel->getByid($id));

