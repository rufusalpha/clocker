<?php
    include_once 'obj.php';
    session_start();

    $db_service = new DatabaseConn('localhost', 'clocker', 'rufus', ']2S7-8hSk!QGlr-w' );
    $connection =  $db_service->getConnection();
    $msg = null;

    if( isset($_POST['login']) && !empty($_POST['login']) && !empty($_POST['passwd'])){
        $user_auth = new User('',$_POST['login'], md5($_POST['passwd']));
    }
    else{
        $msg = "don't works D:";
    }

    /*
    if( isset($_POST['login']) && !empty($_POST['login']) && !empty($_POST['passwd'])){
        if( $_POST['login'] == 'test' && $_POST['passwd'] == 'test' ){
            $_SESSION['vaild'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['UID'] = 'test_complete';
            
            $msg = 'works :D';
        }
        else{
            $msg = "don't works D:";
        }

    }*/
    echo $msg."<br>";
    /*
        $stmt = $connection->prepare("SELECT * FROM users");
        $stmt->execute();
        while($row = $stmt->fetch() ){
            echo $row['ID']." ".$row['name']." ".$row['passwd']."<br>";
        }
    */
    

    


    //header('Location: ../index.php');
?>