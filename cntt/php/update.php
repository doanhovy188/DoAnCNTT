<?php 
require_once ('../lib/dbhelper.php');
    $username= $_GET['username'];
    $idgame= $_GET['idgame'];
    $score= $_GET['score'];
    try {
        $sql = "insert into highscore (userName, idGame, Score)  values ($username, $idgame, $score)";
        execute($sql);
    } catch (Exception $e) {
        echo $e;
    }
