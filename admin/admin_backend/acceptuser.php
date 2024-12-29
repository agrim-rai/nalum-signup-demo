<?php
include('../../backend/connection.php');

if (isset($_GET['userid']) && $_GET['userid'] != '') {
    $userid = $_GET['userid'];
    $userwaitingid = $_GET['userwaitingid'];

    try {
        // Corrected INSERT statement
        $sql = "INSERT INTO accepted_users (id, waitingid) VALUES (:userid, :userwaitingid);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userwaitingid', $userwaitingid);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        header('location:../accept_users.php');
    } catch (Exception $th) {
        echo $th;
    }
} else {
    echo "link broken";
}
