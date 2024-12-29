<?php



$uploadDirectory = "../idcard_upload/";
$uploadedflag = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $fileTmpName = $_FILES["file"]["tmp_name"];
        $fileType = $_FILES["file"]["type"];

        // Set the allowed file types (optional, e.g., for images only)
        $allowedFileTypes = ["image/jpeg", "image/png", "image/gif"];

        // Check file size (less than 20MB)
        if ($fileSize > 20971520) { // 20MB = 20 * 1024 * 1024 bytes
            echo "Error: File size exceeds 20MB limit.";
            exit;
        }

        // Optional: Check file type
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Error: Only JPG, PNG, and GIF formats are allowed.";
            exit;
        }

        // Get the file extension
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Generate a random file name
        $randomFileName = uniqid('img_', false) . "." . $fileExtension;

        // Define the target path for the uploaded file
        $targetFile = $uploadDirectory . $randomFileName;

        // Ensure the uploads directory exists
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        // Move the uploaded file to the target directory with a random name
        if (move_uploaded_file($fileTmpName, $targetFile)) {
            echo "File uploaded successfully with the new name: " . $randomFileName;
            $uploadedflag = true;
        } else {
            echo "Error: Failed to upload the file.";
            $uploadedflag = false;
        }
    } else {
        echo "Error: No file uploaded or there was an issue with the upload.";
        if ($_FILES["file"]["error"] != UPLOAD_ERR_OK) {
            echo "Error: " . $_FILES["file"]["error"];
            exit;
        }
    }
}else{
    header('location:../servererror.php');
}
