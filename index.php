<?php

session_start();

$mysqli = mysqli_connect("localhost","root", "", "SimpleCart");

if (isset($_POST["add_to_cart"])) {

    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id"); 
        if (!in_array($_GET['id'], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'      => $_GET["id"],
                'item_name'    => $_POST["hidden_name"],
                'item_price'   => $_POST["hidden_price"],
                'item_quantity'=> $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
        else {
            
            echo "<script>alert('Item already added')</script>";
            echo "<script>window.location='index.php'</script>";
        }
        # code...
    }
    else {
        
        
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <script src="Jquery/jquery-3.4.1.slim.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php 

    $mysqli = mysqli_connect("localhost", "root", "", "SimpleCart");
    $sql = "SELECT * FROM `products`";
    $result = mysqli_query($mysqli, $sql);
?>
    <section>
        <div class="display-content">
            <div class="container">
                <div class="row">
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <div class="col-md-4">
                            <form action="" method="post">
                                <img class="img-responsive" src="<?php echo 'images/'.$row['images']; ?>" alt="image here">
                                <h4 class="text-info"><?php echo $row["image_text"]; ?></h4>
                                <h4 class="text-danger"><?php echo $row["price"];?></h4>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["image_text"];?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["price"];?>">

                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to cart">

                            </form>
                            
                            
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="show">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Order Details</h3>
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">Item Name</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price</th>
                                <th width="15%">Total</th>
                                <th width="5%">Action</th>
                            </tr>
                            <?php 
                                if (!empty($_SESSION["shopping_cart"])) {
                                    $total = 0;
                                    foreach ($_SESSION['shopping_cart'] as $key => $values) {
                                        # code...
                                
                            ?>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td><?php echo $values["item_price"]; ?></td>
                            <?php }}?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>