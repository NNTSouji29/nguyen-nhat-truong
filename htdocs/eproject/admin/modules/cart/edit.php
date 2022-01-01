<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=cart&action=index");
    exit();
} else {
    $errors = array();
    $id = $_GET["id"];
    if (!check_cart_id ($conn,$id)) {
        header("location:index.php?module=cart&action=index");
        exit();
    }

    $product = get_cart ($conn,$id);
    if (isset($_POST["edit"])) {

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
            if (check_cart_exist ($conn,$product)){
                edit_cart($conn,$product);
                header("location:index.php?module=cart");
                exit();
            }
            else {
                $errors[] = "This cart name already exists";
            }
        }
    }
    ?>

    <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Error message!</h5>
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
                <h3 class="card-title">Edit Cart</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Please enter product name"
                        <?php
                        if (isset($_POST["email"])) {
                            echo 'value="'.$_POST["email"].'"';
                        } else {
                            echo 'value="'.$product["email"].'"';
                        }
                        ?>
                    >
                </div>

                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Please enter product price"
                        <?php
                        if (isset($_POST["fullname"])) {
                            echo 'value="'.$_POST["fullname"].'"';
                        } else {
                            echo 'value="'.$product["fullname"].'"';
                        }
                        ?>
                    >
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Please enter product price"
                        <?php
                        if (isset($_POST["address"])) {
                            echo 'value="'.$_POST["address"].'"';
                        } else {
                            echo 'value="'.$product["address"].'"';
                        }
                        ?>
                    >
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Please enter product price"
                        <?php
                        if (isset($_POST["phone"])) {
                            echo 'value="'.$_POST["phone"].'"';
                        } else {
                            echo 'value="'.$product["phone"].'"';
                        }
                        ?>
                    >
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="total_cart" class="form-control" placeholder="Please enter product price"
                        <?php
                        if (isset($_POST["total_cart"])) {
                            echo 'value="'.$_POST["total_cart"].'"';
                        } else {
                            echo 'value="'.$product["total_cart"].'"';
                        }
                        ?>
                    >
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="edit" class="btn btn-info">Edit</button>

                <button type="reset" class="btn btn-default float-right">Delete</button>
            </div>
        </div>
    </form>
<?php } ?>