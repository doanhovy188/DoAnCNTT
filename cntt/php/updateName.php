<?php 
require_once ('../lib/dbhelper.php');
    $username= $_POST['username'];
    $newName= $_POST['newName'];
    $newURL= "../home.php";
    try {
        //$sql = "insert into highscore (userName, idGame, Score)  values ('$username', $idgame, $score)";
        $sql = 'update account set name="'.$newName.'" where userName= "'.$username.'"';
        execute($sql);
        header('Location: '.$newURL);
    } catch (Exception $e) {
        echo $e;
    }
