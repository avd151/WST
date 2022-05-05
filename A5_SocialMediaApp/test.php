<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image upload test</title>
</head>

// <?php
    // $target_folder = "images/";
    // $target_file = $target_folder . basename($_FILES["image"]["name"]);
    // $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    // echo $filename . "\n";

    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // // Check if image file is a actual image or fake image
    // if (isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["image"]["tmp_name"]);
    //     if ($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }
    // 
    ?>

<?php

$msg = "";


$conn = mysqli_connect("localhost", "root", "", "wst");
if ($conn == false) {
    exit("Failed to connect to database\n");
}

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['submit'])) {

    $filename = $_FILES["image"]["name"];

    $tempname = $_FILES["image"]["tmp_name"];

    $folder = "image/" . $filename;

    // connect with the database


    // query to insert the submitted data

    $sql = "INSERT INTO image (filename) VALUES ('$filename')";

    // function to execute above query

    mysqli_query($conn, $sql);

    // Add the image to the "image" folder"

    // if (move_uploaded_file($tempname, $folder)) {

    //     $msg = "Image uploaded successfully";
    // } else {

    //     $msg = "Failed to upload image";
    // }
}

$result = mysqli_query($conn, "SELECT * FROM image");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['filename'];
    echo "\n";
}
?>

<body>
    <form name="form1" action="" method="post" enctype="multipart/form-data">
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/jpeg, image/jpg" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>