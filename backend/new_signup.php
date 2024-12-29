<?php

include "connection.php";
include "img_uploader.php";
include "imp_function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($uploadedflag == true) {
        $id = generateRandomString(length: 12);
        $waitingid = generateRandomString(8);

        $ipadd = getUserIP();
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password securely

        $filepath = "idcard_upload/$randomFileName";
        $current_datetime = date("Y-m-d H:i:s");

        try {
            $sql = "INSERT INTO `waiting_users` 
            (`id`, `waitingid`, `ipadd`, `email`, `password`, `filepath`, `current_datetime`, `order_date`) 
            VALUES (:id, :waitingid, :ipadd, :email, :passwords, :filepath, :current_datetime, NOW());";
        
            $stmt = $pdo->prepare($sql);
        
            // Bind all parameters securely
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':waitingid', $waitingid);
            $stmt->bindParam(':ipadd', $ipadd);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passwords', $password);
            $stmt->bindParam(':filepath', $filepath);
            $stmt->bindParam(':current_datetime', $current_datetime);
        
            // Execute the statement
            $stmt->execute();

            header("location:../waiting.php?waitingid=$waitingid");
        } catch (Exception $e) {
            echo $e;
            // Uncomment the line below to redirect to a server error page
            // header("location:../servererror.php");
            // exit();
        }
    } else {
        echo "file upload failed ";
    }
} else {
    header("location:../index.php");
    exit();
}
