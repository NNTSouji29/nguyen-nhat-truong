<?php
$errors = array();
$p_post = get_all_category($conn);

if (isset($_POST["create"])) {

    if (empty($_POST["title"])) {
        $errors[] = "Please enter product name";
    }
    if (empty($_POST["content"])) {
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
            'title' => $_POST["title"],
            'content' => $_POST["content"],
            'image' => $file
        );

        if (check_post_exist ($conn,$data)) {
            create_post ($conn,$data);
            move_uploaded_file($_FILES["image"]["tmp_name"],'../public/upload/'.$file);

            header("location:index.php?module=post");
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
            <h3 class="card-title">Create post</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>---- ROOT ----</label>
                <select class="form-control" name="title">
                    <?php recursiveOption ($p_post,$_POST["title"],) ?>
                </select>
            </div>

            <div class="form-group">
                <label>Title name</label>
                <input type="text" name="title" class="form-control" placeholder="Please enter title name"
                    <?php
                    if (isset($_POST["title"])) {
                        echo 'value="'.$_POST["title"].'"';
                    }
                    ?>
                >
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
            <div class="card-footer">
                <button type="submit" name="create" class="btn btn-info">Edit</button>

                <button type="reset" class="btn btn-default float-right">Delete</button>
            </div>
        </div>
</form>