<?php

include_once 'config.php';

$status = $statusMsg = '';
if (!empty($_SESSION['status_response'])) {
    $status_response = $_SESSION['status_response'];
    $status = $status_response['status'];
    $statusMsg = $status_response['status_msg'];

    unset($_SESSION['status_response']);
}
?>

<?php if (!empty($statusMsg)) { ?>
    <div><?php echo $statusMsg; ?></div>
<?php } ?>

<div>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <div>
            <label>File</label>
            <input type="file" name="file">
        </div>
        <div>
            <button type="submit" name="submit">upload</button>
        </div>
    </form>
</div>