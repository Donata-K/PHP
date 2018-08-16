<!DOCTYPE html>
<html>
<body>

<?php

$target_dir = 'uploads/ ';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo '<br>Sorry, file already exists.<br>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES['fileToUpload']['size'] > 500000) {
    echo '<br>Sorry, your file is too large.<br>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'
&& $imageFileType != 'gif' ) {
    echo '<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<br>Sorry, your file was not uploaded.<br>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo '<br>The file '. basename( $_FILES['fileToUpload']['name']). ' has been uploaded.<br>';
    } else {
        echo '<br>Sorry, there was an error uploading your file.<br>';
    }
}




?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>



</body>
</html>