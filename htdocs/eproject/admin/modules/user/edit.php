<?php
if (!isset($_GET["id"])) {
    header("location:index.php?module=user&action=index");
    exit();
} else {
    $errors = array();
    $id = $_GET["id"];

    if (!check_user_id ($conn,$id)) {
        header("location:index.php?module=user&action=index");
        exit();
    }
    $user = get_user ($conn,$id);

    $edit_myself = null;
    if ($_SESSION["login"]["id"] == $id) {
        $edit_myself = true;
    } else {
        $edit_myself = false;
    }

    if ($_SESSION["login"]["id"] != 1 && ($_GET["id"] == 1 || ($user["level"] == 1 && $edit_myself == false))) {
        echo '<script>
                alert("You are not authorized to edit this user")
                window.location.href="index.php?module=user&action=index"
            </script>';
        exit();
    }

    if (isset($_POST["edit"])) {

        $data = array(
            "id" => $id
        );

        if (!$edit_myself) {
            $data["level"] = $_POST["level"];
        }

        if (empty($_POST["password"])) {
            $data["password"] = $user["password"];
        } else {
            if (strlen($_POST["password"]) <= 6) {
                $errors[] = "The password must be at least 7 characters";
            } elseif ($_POST["password"] != $_POST["password_confirmation"]) {
                $errors[] = "Two passwords don't match";
            } else {
                $data["password"] = md5($_POST["password"]);
            }
        }

        if (empty($errors)) {
            edit_user ($conn,$data);

            header("location:index.php?module=user");
            exit();
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
                <h3 class="card-title">Edit User</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $user["email"] ?>" disabled />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="123abcd" />
                </div>

                <div class="form-group">
                    <label>Repassword</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="123abcd" />
                </div>

                <?php if (!$edit_myself) { ?>
                    <div class="form-group">
                        <label>Authority</label>
                        <select name="level" class="form-control">
                            <option value="2" <?php
                            if ($user["level"] == 2) {
                                echo 'selected';
                            }
                            ?>>Member</option>
                            <option value="1"<?php
                            if ($user["level"] == 1) {
                                echo 'selected';
                            }
                            ?>>Admin</option>
                        </select>
                    </div>
                <?php } ?>
            </div>
            <div class="card-footer">
                <button type="submit" name="edit" class="btn btn-info">Edit</button>

                <button type="reset" class="btn btn-default float-right">Cancel</button>
            </div>
        </div>
    </form>
<?php } ?>