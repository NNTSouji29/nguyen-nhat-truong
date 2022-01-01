<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=post&action=index");
    exit();
} else {
    $errors = array();
    $id = $_GET["id"];
    $p_post= get_all_category ($conn);

    if (!check_post_id ($conn,$id)) {
        header("location:index.php?module=post&action=index");
        exit();
    }

    $post = get_post ($conn,$id);

    if (isset($_POST["edit"])) {

        if (empty($_POST["title"])) {
            $errors[] = "Please enter title name";
        }

        if (empty($_POST["content"])) {
            $errors[] = "Please enter content";
        }

        if (empty($errors)) {

            $data = array(
                'title' => $_POST["title"],
                'content' => $_POST["content"],
                "id" => $id
            );

            if (check_post_exist ($conn,$data,true)) {

                if (!empty($_FILES["image"]["name"])) {
                    if (!checkExt($_FILES["image"]["name"])) {
                        $errors[] = "Not an image file";
                    } else {
                        $file = changeNameFile($_FILES["image"]["name"]);
                        $data["image"] = $file;
                        move_uploaded_file($_FILES["image"]["tmp_name"],'../public/upload/'.$file);
                    }
                } else {
                    $data["image"] = $p_post["image"];
                }

                edit_post ($conn,$data);

                header("location:index.php?module=post");
                exit();
            } else {
                $errors[] = "This post name already exists";
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
                <h3 class="card-title">Edit post</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Catagory</label>
                    <select class="form-control" name="post">
                        <?php recursiveOption ($p_post,$_POST["post"]) ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Title</label>
                        <textarea class="form-control" name="title"><?php
                            if (isset($_POST["title"])) {
                                echo $_POST["title"];
                            } else {
                                echo $post["title"];
                            }
                            ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content"><?php
                        if (isset($_POST["content"])) {
                            echo $_POST["content"];
                        } else {
                            echo $post["content"];
                        }
                        ?></textarea>
                </div>
                <div class="form-group">
                    <label>Current picture</label>
                    <img src="../public/upload/<?php echo $post["image"] ?>" onerror="imgError(this);" width="80px" class="d-block" />
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="edit" class="btn btn-info">Edit</button>
                <button type="reset" class="btn btn-default float-right">Delete</button>
            </div>
        </div>
    </form>
<?php } ?>