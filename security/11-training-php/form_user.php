<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

function hashId($id)
{
    return md5($id);
}

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $hashID = $_GET['id'];
    $allUsers = $userModel->getUsers(); // Lấy tất cả người dùng

    foreach ($allUsers as $u) {
        if (hashId($u['id']) == $hashID) {
            $_id = $u['id']; // Lấy ID thực sự
            $user = $userModel->findUserById($_id);
            break;
        }
    }
}



if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else {
        $userModel->insertUser($_POST);
    }
    header('location: list_users.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    <small id="nameError" class="text-danger" style="font-weight: 25px;"></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                    <small id="passwordError" class="text-danger"></small>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>  
        <?php } ?>
    </div>



    <script>
        function validateForm() {
            // Lấy giá trị của các trường
            const name = document.getElementById('name').value;
            const password = document.getElementById('password').value;

            // Biến kiểm tra
            let valid = true;

            // Xóa thông báo lỗi trước khi validate
            document.getElementById('nameError').innerHTML = "";
            document.getElementById('passwordError').innerHTML = "";

            // Validate Name
            const nameRegex = /^[a-zA-Z0-9]{5,15}$/;
            if (name === "") {
                document.getElementById('nameError').innerHTML = "Vui lòng nhập tên.";
                valid = false;
            } else if (!nameRegex.test(name)) {
                document.getElementById('nameError').innerHTML = "Tên chỉ được chứa các ký tự A-Z, a-z, 0-9 và có độ dài từ 5 đến 15 ký tự.";
                valid = false;
            }

            // Validate Password
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()]).{5,10}$/;
            if (password === "") {
                document.getElementById('passwordError').innerHTML = "Vui lòng nhập mật khẩu.";
                valid = false;
            } else if (!passwordRegex.test(password)) {
                document.getElementById('passwordError').innerHTML = "Mật khẩu phải chứa chữ thường, chữ hoa, số, ký tự đặc biệt và có độ dài từ 5 đến 10 ký tự.";
                valid = false;
            }

            // Trả về false nếu có lỗi
            return valid;
        }
    </script>
</body>

</html>