<?php
$errors = array();
if (isset($_POST["create"])) {

    if (empty($_POST["email"])) {
        $errors[] = "Please enter email";
    }

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST["email"])) {
        $errors[] = "Incorrect email format";
    }
    if (empty($_POST["fullname"])) {
        $errors[] = "Please enter fullname";
    }
    if (empty($_POST["address"])) {
        $errors[] = "Please enter address";
    }
    if (empty($_POST["phone"])) {
        $errors[] = "Please enter phone";
    }
    if (empty($_POST["total_cart"])) {
        $errors[] = "Please enter total_cart";
    }

    if (empty($errors)) {

        $product = array(
            'email' => $_POST["email"],
            'fullname' => $_POST["fullname"],
            'address' => $_POST["address"],
            'phone' => $_POST["phone"],
            "total_cart" => $_POST["total_cart"]
        );


        if (check_cart_exist ($conn,$product)) {
            create_cart($conn,$product);
            header("location:index.php?module=cart");
            exit();
        } else {
            $errors[] = "This cart name already exists";
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
            <h3 class="card-title">Create Cart</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" class="form-control" placeholder="user@gmail.com"
                    <?php
                    if (isset($_POST["email"])) {
                        echo 'value="'.$_POST["email"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="fullname" class="form-control" placeholder="Please enter title fullname"
                    <?php
                    if (isset($_POST["fullname"])) {
                        echo 'value="'.$_POST["fullname"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Please enter title name"
                    <?php
                    if (isset($_POST["address"])) {
                        echo 'value="'.$_POST["address"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Please enter title name"
                    <?php
                    if (isset($_POST["phone"])) {
                        echo 'value="'.$_POST["phone"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Total Cart</label>
                <input type="text" name="total_cart" class="form-control" placeholder="Please enter title name"
                    <?php
                    if (isset($_POST["total_cart"])) {
                        echo 'value="'.$_POST["total_cart"].'"';
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