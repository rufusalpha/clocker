<?php include_once 'obj.php'; include_once 'config.php'; session_start();
    
    date_default_timezone_set("Europe/Warsaw");
    $tsmp = date("H:i:s");
    $tday = date("Y-m-d");

    $db_service = new DatabaseConn( DB_HOST, DB_NAME, DB_USER , DB_PASS );
    $connection = $db_service->getConnection();
    $msg = null;

    $query = "SELECT * FROM times WHERE ID='" . $_SESSION['UID'] . "' AND date='" . $tday . "'";
        $stmt = $connection->prepare( $query );
        $stmt->execute();

    if( $stmt->rowCount() > 0 ){
        while( $row = $stmt->fetch() ){
            echo $row['ID']. " " . $row['date'] . " " . $row['time_start'] . " " . $row['time_stop'] . "<br>";
        }
    }
    else{
        $query = "INSERT INTO times SET ID = ?, date = ?";
            $stmt = $connection->prepare( $query );
            $stmt->execute([$_SESSION['UID'],$tday]);
        echo "no data, inserting";
    }
        

    if( isset($_POST['submit']) && $_POST['submit']=="Start Work" ){
        $query = "UPDATE times SET time_start = ? where ID = ? AND date = ?";
            $stmt = $connection->prepare( $query );
            $stmt->execute([ $tsmp, $_SESSION['UID'],$tday ]);

        echo "update time_start";
    }

    if( isset($_POST['submit']) && $_POST['submit']=="Stop Work" ){
        $query = "UPDATE times SET time_stop = ? where ID = ? AND date = ?";
            $stmt = $connection->prepare( $query );
            $stmt->execute([ $tsmp, $_SESSION['UID'],$tday ]);
        echo "update time_stop";
    }

    header('Location: ../index.php');
?>