<?php
$errors = array();
if (isset($_POST["create"])) {

    if (empty($_POST["product_id"])) {
        $errors[] = "Please enter product id";
    }
    if (empty($_POST["cart_id"])) {
        $errors[] = "Please enter cart id";
    }
    if (empty($_POST["quantily"])) {
        $errors[] = "Please enter quantily";
    }
    if (empty($_POST["price"])) {
        $errors[] = "Please enter price";
    }
    if (empty($errors)) {

        $product = array(
            'product_id' => $_POST["product_id"],
            'cart_id' => $_POST["cart_id"],
            "quantily" => $_POST["quantily"],
            "price" => $_POST["price"]
        );


        if (check_cart_detail_exist ($conn,$product)) {
            create_cart_detail($conn,$product);
            header("location:index.php?module=cart_detail");
            exit();
        } else {
            $errors[] = "This cart detail name already exists";
        }
    }
}
?>

<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i>Error</h5>
        <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error ?></li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<form method="POST" action="" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Cart Detail</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label >Product id</label>
                <input type="text" name="product_id" class="form-control" placeholder="Please enter  product id"
                    <?php
                    if (isset($_POST["product_id"])) {
                        echo 'value="'.$_POST["product_id"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Cart id</label>
                <input type="text" name="cart_id" class="form-control" placeholder="Please enter  Cart id"
                    <?php
                    if (isset($_POST["cart_id"])) {
                        echo 'value="'.$_POST["cart_id"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Quantily</label>
                <input type="text" name="quantily" class="form-control" placeholder="Please enter  quantily"
                    <?php
                    if (isset($_POST["quantily"])) {
                        echo 'value="'.$_POST["quantily"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Please enter  price"
                    <?php
                    if (isset($_POST["price"])) {
                        echo 'value="'.$_POST["price"].'"';
                    }
                    ?>
                >
            </div>
            <div class="card-footer">
                <button type="submit" name="create" class="btn btn-info">Create</button>

                <button type="reset" class="btn btn-default float-right">Delete</button>
            </div>
        </div>
    </div>
</form>