<?php
    include_once 'backend/config.php'; include_once 'backend/obj.php';

    $db_service = new DatabaseConn( DB_HOST, DB_NAME, DB_USER , DB_PASS );
    $connection = $db_service->getConnection();

    $query = "SELECT * FROM times WHERE ID=" . $_SESSION['UID'] . " ORDER by date";
        $stmt = $connection->prepare( $query );
        $stmt->execute();

    echo "<table> <tr><th>Date</th><th>Started at</th><th>Stopped at</th><th>Work time</th><tr>";
        if( $stmt->rowCount() > 0 ){
            while( $row = $stmt->fetch() ){
                $stp = strtotime($row['time_stop']);
                $str = strtotime($row['time_start']);

                $interval = $stp - $str;
                echo "<tr><td>".$row['date'] . "</td><td>" . $row['time_start'] . "</td><td>" . $row['time_stop'] . "</td><td>" . gmdate("H:i:s", $interval) . "</td><td>" . "</td></tr>";
            }
        }
    echo "</table>";


?>