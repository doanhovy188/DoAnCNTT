<?php
if (session_id() === '')
    session_start();
require_once("../lib/connection.php");
if (isset($conn)) {


    //lấy input
    $username = $_POST["userNameRegister"];
    $password = $_POST["pswRegister"];
    $password_repeat = $_POST["pswRepeat"];


    //Xử lí input
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $password_repeat = strip_tags($password_repeat);
    $password_repeat = addslashes($password_repeat);


    //kiểm tra input để thực hiện chèn account vào databse
    if ($username == "" || $password == "" || $password_repeat == "") {

        //Không nhập đầy đủ thông tin
        $_SESSION['register_status'] = "emptyInput";
        //alert("vui lòng nhập đầy đủ thông tin!");

    }else if ($password === $password_repeat) {

        $sql="select * from account where userName='$username'";
        $kt=mysqli_query($conn, $sql);

        if(isset($kt) && (!$kt || mysqli_num_rows($kt) == 0)){

            $sql = "insert into account(userName,passWord) values ('$username','$password')";

            if (!mysqli_query($conn,$sql)==true) {

                //Đăng ký không thành công
                $_SESSION['register_status'] = "failed";
                //alert("Đăng ký không thành công.");

            }
            else {

                //Đăng ký thành công
                $_SESSION['register_status'] = "succeeded";
                //alert("Đăng ký thành công!");

            }
        }
        else {

            //Tài khoản đã tồn tại
            $_SESSION['register_status'] = "existed";
            //alert("Tài khoản đã tồn tại!");

        }

    }else {

        //Mật khẩu không khớp
        $_SESSION['register_status'] = "notMatch";
        //alert("Mật khẩu không khớp vui lòng nhập lại.");


    }
} else {

    //Lỗi kết nối
    $_SESSION['register_status'] = "connectionFailed";
    //alert("Lỗi kết nối hệ thống, vui lòng thử lại sau.");
}

back();

function alert($message){
    echo "<script type='text/javascript'>alert('$message');</script>";
}

function back(){
    header("Location: ../index.php");
}