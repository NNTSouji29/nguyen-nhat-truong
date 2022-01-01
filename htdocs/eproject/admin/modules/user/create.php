<?php
$errors = array();

if (isset($_POST["create"])) {
    if (empty($_POST["email"])) {
        $errors[] = "Please enter email";
    }

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST["email"])) {
        $errors[] = "Incorrect email format";
    }

    if (empty($_POST["password"])) {
        $errors[] = "Please enter password";
    }

    if (strlen($_POST["password"]) <= 6) {
        $errors[] = "The password must be at least 7 characters";
    }


    if ($_POST["password"] != $_POST["password_confirmation"]) {
        $errors[] = "Two passwords don't match";
    }

    if (empty($errors)) {
        $data = array(
            "email" => $_POST["email"],
            "password" => md5($_POST["password"]),
            "level" => $_POST["level"]
        );

        if (check_user_exist ($conn,$data)) {
            create_user ($conn,$data);

            header("location:index.php?module=user");
            exit();
        } else {
            $errors[] = "User already exists";
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
            <h3 class="card-title">Create User</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="user@gmail.com"
                    <?php
                    if (isset($_POST["email"])) {
                        echo 'value="'.$_POST["email"].'"';
                    }
                    ?>
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="123abcd" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Repassword</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="123abcd" />
            </div>

            <div class="form-group">
                <label>Authority</label>
                <select name="level" class="form-control">
                    <option value="2">Member</option>
                    <option value="1">Admin</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="create" class="btn btn-info">Add</button>

            <button type="reset" class="btn btn-default float-right">Cancel</button>
        </div>
    </div>
</form>