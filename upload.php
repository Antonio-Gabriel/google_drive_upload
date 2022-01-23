<?php
// Include database configuration file 
require_once 'dbconfig.php';

$statusMsg = $valErr = '';
$status = 'danger';

// If the form is submitted 
if (isset($_POST['submit'])) {

    // Validate form input fields 
    if (empty($_FILES["file"]["name"])) {
        $valErr .= 'Please select a file to upload.<br/>';
    }

    // Check whether user inputs are empty 
    if (empty($valErr)) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Upload file to local server         
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

            // Insert data into the database 
            $sqlQ = "INSERT INTO drive_files (file_name, created) VALUES (:fileName, NOW())";
            $stmt = $db->prepare($sqlQ);
            $insert = $stmt->execute([
                ":fileName" => $fileName
            ]);

            if ($insert) {
                $file_id = $db->lastInsertId();

                // Store DB reference ID of file in SESSION 
                $_SESSION['last_file_id'] = $file_id;

                header("Location: $googleOauthURL");
                exit();
            } else {
                $statusMsg = 'Something went wrong, please try again after some time.';
            }
        } else {
            $statusMsg = 'File upload failed, please try again after some time.';
        }
    } else {
        $statusMsg = '<p>Please fill all the mandatory fields:</p>' . trim($valErr, '<br/>');
    }
} else {
    $statusMsg = 'Form submission failed!';
}

function getPathLocation($dir)
{

    return $_SERVER["DOCUMENT_ROOT"]
        . DIRECTORY_SEPARATOR . "google_drive_upload"
        . DIRECTORY_SEPARATOR . $dir
        . DIRECTORY_SEPARATOR;
}

$_SESSION['status_response'] = array('status' => $status, 'status_msg' => $statusMsg);

header("Location: index.php");
exit();
