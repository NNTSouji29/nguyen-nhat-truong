
<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=collection&action=index");
    exit();
} else {
    $errors = array();
    $id = $_GET["id"];
    $collection_category = get_all_category ($conn);

    if (!check_collection_id ($conn,$id)) {
        header("location:index.php?module=collection&action=index");
        exit();
    }

    $collection = get_collection ($conn,$id);

    if (isset($_POST["edit"])) {

        if (empty($_POST["name"])) {
            $errors[] = "Please enter product name";
        }

        if (empty($errors)) {

            $data = array(
                'name' => $_POST["name"],
                "category_id" => $_POST["category_id"],
                "id" => $id
            );

            if (check_collection_exist ($conn,$data,true)) {

                if (!empty($_FILES["image"]["name"])) {
                    if (!checkExt($_FILES["image"]["name"])) {
                        $errors[] = "Not an image file";
                    } else {
                        $file = changeNameFile($_FILES["image"]["name"]);
                        $data["image"] = $file;
                        move_uploaded_file($_FILES["image"]["tmp_name"],'../public/upload/'.$file);
                    }
                } else {
                    $data["image"] = $product["image"];
                }

                edit_collection ($conn,$data);

                header("location:index.php?module=collection");
                exit();
            } else {
                $errors[] = "This collection name already exists";
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
                <h3 class="card-title">Edit product</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Catagory</label>
                    <select class="form-control" name="category_id">
                        <?php recursiveOption ($collection_category,$_POST["category_id"]) ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Product's name</label>
                    <input type="text" name="name" class="form-control" placeholder="Please enter product name"
                        <?php
                        if (isset($_POST["name"])) {
                            echo 'value="'.$_POST["name"].'"';
                        } else {
                            echo 'value="'.$collection["name"].'"';
                        }
                        ?>
                    >
                </div>

                <div class="form-group">
                    <label>Current picture</label>
                    <img src="../public/upload/<?php echo $collection["image"] ?>" onerror="imgError(this);" width="100px" class="d-block" />
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            <div class="card-footer">
                <button type="submit" name="edit" class="btn btn-info">Edit</button>

                <button type="reset" class="btn btn-default float-right">Delete</button>
            </div>
        </div>
    </form>
<?php } ?>
