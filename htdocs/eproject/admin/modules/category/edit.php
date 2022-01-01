<form method="post">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <?php
        if (!isset($_GET['id'])){
            header('location:index.php?module=category&action=index');
            exit();
        }else {
            $errors = array();
            $id = $_GET['id'];
            $parent_category = get_all_category($conn,true,$id);
            if (!check_category_id($conn,$id)){
                header('location:index.php?module=category&action=index');
                exit();
            }
            $category = get_category($conn,$id);
            if (isset($_POST['edit'])) {
                if (empty($_POST['name'])) {
                    $errors[] = "please enter name category";
                }

                if (empty($errors)) {
                    $data = array(
                        'name' => $_POST['name'],
                        'parent' => $_POST['parent'],
                        'id' => $id
                    );
                    if (check_category_exist($conn,$data,true)) {
                        edit_category($conn, $data);
                        header('location:index.php?module=category&action=index');
                        exit();
                    } else {
                        $errors[] = "This name category already exists";
                    }
                }
            }
        }
        ?>
        <?php if (!empty($errors)){ ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i>Error</h5>
                <ul>
                    <?php foreach ($errors as $error){ ?>
                        <li><?php echo $error ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <div class="card-body">
            <div class="form-group">
                <label for="name">Name Category</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo $category['name']?>">
            </div>
            <div class="form-group">
                <label>Parent category</label>
                <select class="form-control" name="parent">
                    <option value="0">---- ROOT ----</option>
                    <?php recursiveOption ($parent_category,$category['parent']) ?>
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" name="edit" class="btn btn-info">Edit</button>
                <button type="submit" name="cancel" class="btn btn-default float-right">Cancel</button>
            </div>
        </div>
    </div>
</form>



