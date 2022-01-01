<?php
$errors = array();
$parent_category = get_all_category ($conn);

if (isset($_POST["create"])) {

    if (empty($_POST["name"])) {
        $errors[] = "Please enter product name";
    }

    if (empty($_POST["price"])) {
        $errors[] = "Please enter product price";
    }

    if (!is_numeric($_POST["price"])) {
        $errors[] = "Product price must be number";
    }

    if (empty($_POST["intro"])) {
        $errors[] = "Please enter intro ";
    }

    if (empty($_FILES["image"]["name"])) {
        $errors[] = "Please enter a image";
    }

    if (!checkExt($_FILES["image"]["name"])) {
        $errors[] = "Not an image file";
    }

    if (empty($errors)) {
        $file = changeNameFile($_FILES["image"]["name"]);

        $data = array(
            'name' => $_POST["name"],
            'price' => $_POST["price"],
            'intro' => $_POST["intro"],
            'content' => $_POST["content"],
            'image' => $file,
            'status' => $_POST["status"],
            "featured" => $_POST["featured"],
            "category_id" => $_POST["category_id"]
        );

        if (check_product_exist ($conn,$data)) {
            create_product ($conn,$data);
            move_uploaded_file($_FILES["image"]["tmp_name"],'../public/upload/'.$file);

            header("location:index.php?module=product");
            exit();
        } else {
            $errors[] = "This product name already exists";
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
            <h3 class="card-title">Create products</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Product</label>
                <select class="form-control" name="category_id">
                    <?php recursiveOption ($parent_category,$_POST["category_id"]) ?>
                </select>
            </div>

            <div class="form-group">
                <label>Product name</label>
                <input type="text" name="name" class="form-control" placeholder="Please enter product name"
                    <?php
                    if (isset($_POST["name"])) {
                        echo 'value="'.$_POST["name"].'"';
                    }
                    ?>
                >
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Please enter product price"
                    <?php
                    if (isset($_POST["price"])) {
                        echo 'value="'.$_POST["price"].'"';
                    }
                    ?>
                >
            </div>

            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" name="intro"><?php
                    if (isset($_POST["intro"])) {
                        echo $_POST["intro"];
                    }
                    ?></textarea>
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content"><?php
                    if (isset($_POST["content"])) {
                        echo $_POST["content"];
                    }
                    ?></textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="1">In Stock</option>
                    <option value="0">Out Of Stock</option>
                </select>
            </div>

            <div class="form-group">
                <label>Featured</label>
                <select class="form-control" name="featured">
                    <option value="0">Hide</option>
                    <option value="1">Show</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-info">Create</button>

            <button type="reset" class="btn btn-default float-right">Delete</button>
        </div>
    </div>
</form>