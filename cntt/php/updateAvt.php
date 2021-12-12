<?php
    require_once ('../lib/dbhelper.php');
    $newURL= "../home.php";
    $username= $_POST['username'];
    $avt = 0;
    $sql = 'update account set image="avatar1.png" where userName= "'.$username.'"';
    execute($sql);
    if(isset($_POST['avatar1'])) {
        $avt = 1;
    }
    else if(isset($_POST['avatar2'])) {
        $avt = 2;
    }
    else if(isset($_POST['avatar3'])) {
        $avt = 3;
    }
    else if(isset($_POST['avatar4'])) {
        $avt = 4;
    }
    else if(isset($_POST['avatar5'])) {
        $avt = 5;
    }
    else if(isset($_POST['avatar6'])) {
        $avt = 6;
    }
    else if(isset($_POST['avatar7'])) {
        $avt = 7;
    }
    else if(isset($_POST['avatar8'])) {
        $avt = 8;
    }
    else if(isset($_POST['avatar9'])) {
        $avt = 9;
    }
    else if(isset($_POST['avatar10'])) {
        $avt = 10;
    }
    else if(isset($_POST['avatar11'])) {
        $avt = 11;
    }
    else if(isset($_POST['avatar12'])) {
        $avt = 12;
    }
    if ($avt!=0){
        try{
            $sql = 'update account set image="avatar'.$avt.'.png" where userName= "'.$username.'"';
            execute($sql);
        } catch (Exception $e){ echo $e;}
    }
    header('Location: '.$newURL);
?>