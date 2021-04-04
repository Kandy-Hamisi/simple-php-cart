

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="Jquery/jquery-3.4.1.slim.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
</head>
<body>
    <section>
        <div class="form-insert">
            <form action="product-action.php" role="form" method="POSt" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Image name</label>
                    <input type="text"  name="image_text" placeholder="Enter image name" id="">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" placeholder="Enter the price" id="">
                </div>
                <div class="form-group">
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <input type="submit" name="upload" value="Upload">
                </div>
            </form>
        </div>
    </section>
</body>
</html>