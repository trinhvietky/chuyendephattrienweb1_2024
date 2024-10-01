<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();
function hashId($id) {
    return md5($id);
}
$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $hashID = $_GET['id'];
    $allUsers = $userModel->getUsers(); // Lấy tất cả người dùng

    foreach ($allUsers as $u) {
        if (hashId($u['id']) == $hashID) {
            $_id = $u['id']; // Lấy ID thực sự
            $user = $userModel->findUserById($_id);
            $userModel->deleteUserById($_id);//Delete existing user
            break;
        }
    }
}



// if (!empty($_GET['id'])) {
//     $id = $_GET['id'];
//     $userModel->deleteUserById($id);//Delete existing user
// }
header('location: list_users.php');
?>