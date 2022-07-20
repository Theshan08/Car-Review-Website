<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../users.php';

$database = new Database();
$db = $database->getConnection();
$item = new User($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->name = $_GET['name'];
$item->email = $_GET['email'];
$item->password = $_GET['password'];
$item->created = date('Y-m-d H:i:s');
if($item->updateUser()){
echo json_encode("User data updated.");
} else{
echo json_encode("Data could not be updated");
}
?>