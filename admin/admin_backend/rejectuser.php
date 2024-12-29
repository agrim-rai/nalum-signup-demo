<?php
include('../../backend/connection.php');

if (isset($_GET['userid']) && $_GET['userid'] != '') {
    $userid = $_GET['userid'];
    $userwaitingid = $_GET['userwaitingid'];

    try {
        
        // DELETE query remains the same
        $sql = "DELETE FROM waiting_users WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $userid);
        $stmt->execute();

        header('location:../accept_users.php');
    } catch (Exception $th) {
        echo $th;
    }
} else {
    echo "link broken";
}
