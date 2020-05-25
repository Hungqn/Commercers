<?php
require_once('OOP/Model/CustomerModel.php');

$data = $_POST;

$result = [];

$customerModel = new CustomerModel();
$customer['name'] = $data['name'];
$customer['email'] = $data['email'];
$customer['password'] = md5($data['email']);

if (!filter_var($customer['email'], FILTER_VALIDATE_EMAIL)) {
    $result['error'] = true;
    $result['message'] = 'Invalid email';
} elseif($customerModel->checkEmailExist($customer['email'])) {
    $result['error'] = true;
    $result['message'] = 'Email is existed';
} else {
    try {
        $customerModel->create($customer);
        $result['error'] = false;
        $result['message'] = 'Customer is created succesfully';
    } catch(Exception $e){
        $result['error'] = true;
        $result['message'] = $e->getMessage();
    }
}

echo json_encode($result);