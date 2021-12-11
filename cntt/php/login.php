<?php
if (session_id() === '')
    session_start();
require_once("../lib/connection.php");
if (isset($conn)) {
    $username = $_POST["username"];
    $password = $_POST["psw"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password == "") {
        $message = "username hoặc password bạn không được để trống!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $sql = "select * from account where userName='$username'";
        $kt = mysqli_query($conn, $sql);
        if (isset($kt) && ($kt == false)) {
            alert_Wrong_Input();
        } else {
            while ($row = $kt->fetch_assoc()) {
                $ps = $row["passWord"];
            }
            if ((isset($ps) && $ps != $password)||!isset($ps)) {
                alert_Wrong_Input();
            } else {
                $_SESSION['username'] = $username;
                header('Location: ../home.php');
                exit();
            }
        }
    }
} else {
    $message = "Lỗi kết nối hệ thống, vui lòng thử lại sau.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

function alert_Wrong_Input(){
    $message = "Sai tên tài khoản hoặc mật khẩu";
    echo "<script type='text/javascript'>alert('$message');</script>";
}