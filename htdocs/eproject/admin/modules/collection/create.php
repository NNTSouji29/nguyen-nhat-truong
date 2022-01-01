<?php
$errors = array();
$collection_category = get_all_category ($conn);

if (isset($_POST["create"])) {

    if (empty($_POST["name"])) {
        $errors[] = "Please enter collection name";
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
            'image' => $file,
            "category_id" => $_POST["category_id"]
        );

        if (check_collection_exist ($conn,$data)) {
            create_collection ($conn,$data);
            move_uploaded_file($_FILES["image"]["tmp_name"],'../public/upload/'.$file);

            header("location:index.php?module=collection");
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
                    <?php recursiveOption ($collection_category,$_POST["category_id"]) ?>
                </select>
            </div>

            <div class="form-group">
                <label>Collection name</label>
                <input type="text" name="name" class="form-control" placeholder="Please enter collection name"
                    <?php
                    if (isset($_POST["name"])) {
                        echo 'value="'.$_POST["name"].'"';
                    }
                    ?>
                >
            </div>
            <div class="form-group">
                <label>Image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-info">Create</button>

            <button type="reset" class="btn btn-default float-right">Delete</button>
        </div>
    </div>
</form>