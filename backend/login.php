<?php
    session_start();

    $msg = 'test';
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

    }
    echo $msg;


    header('Location: ../index.php');
?>