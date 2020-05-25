<?php
session_start();

require_once('OOP/Model/ProductModel.php');

$id = $_POST['id'];
$action = $_POST['action'];

$productModel = new ProductModel();
$product = $productModel->getByid($id);

$result['error'] = false;
if($action == 'add') {
    $product['qty'] = $_POST['qty'];
    $_SESSION['products'][$id] = $product;

    $result['message'] = 'Product is added to Session';
} elseif($action == 'remove') {  
    unset($_SESSION['products'][$id]);
    
    $result['message'] = 'Product is removed from Session';
}


echo json_encode($result);
