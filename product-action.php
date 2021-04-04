<?php
//include('db-connect.php');
$mysqli = mysqli_connect("localhost", "root", "", "SimpleCart");

$image_text = "";
$price = "";

if (isset($_POST['upload'])) {

    // Getting inputs from the form
    $image_text = mysqli_real_escape_string($mysqli, $_POST['image_text']);
    $price  = mysqli_real_escape_string($mysqli, $_POST['price']);
    

    // Get the image name

    $image = $_FILES['image']['name'];

    //image file directory
    $target = "images/".basename($image);

    $sql = "INSERT INTO products(images, image_text, price) VALUES('$image', '$image_text, '$price')";
    $sql = "INSERT INTO `products` (`images`, `image_text`, `price`) VALUES ('$image', '$image_text', '$price')";
    // Executing the query
    mysqli_query($mysqli, $sql);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            //echo '<script>window.location="product-insert.php";</script>';
            echo "Successful";
        }
        else {
            //echo '<script>window.alert("Image failed to upload");</script>';
            echo "Unsuccessful";
        }
}


?>