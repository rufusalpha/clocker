<?php
    include_once 'obj.php';
    include_once 'config.php';
    session_start();

    $db_service = new DatabaseConn( DB_HOST, DB_NAME, DB_USER , DB_PASS );
    $connection = $db_service->getConnection();

    if( isset($_POST['login']) && !empty($_POST['login']) && !empty($_POST['passwd'])){
        $userForm = new User('',$_POST['login'], md5($_POST['passwd']));

        $query = "SELECT * FROM users WHERE name='" . $userForm->getName() . "'";
        $stmt = $connection->prepare( $query );
        $stmt->execute();
        while($row = $stmt->fetch() ){
            $userBase = new User( $row['ID'], $row['name'], $row['passwd']);
            
            if( $userForm->compareTo($userBase) ){
                echo "User Logged in successfully :)";

                $userForm->setUID( $userBase->getUID() );
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['UID'] = $userForm->getUID();
                $_SESSION['uname'] = $userForm->getName();
            }
            else{
                echo "username or password invalid :(";

                $_SESSION['valid'] = false;
                $_SESSION['timeout'] = time();
            }
        }
        

    }
    else{
        $msg = "don't works D:";
    }

    echo $msg."<br>";

    header('Location: ../index.php');
?>