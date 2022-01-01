<?php
session_start();
ob_start();
if ($_SESSION["login"]["level"] != 1) {
    header("location:login.php");
    exit();
}

include '../config.php';
include '../libs/connect.php';
include '../libs/functions.php';
?>
<!DOCTYPE html>
<head>
    <?php include 'blooks/head.php' ?>
</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <?php include 'blooks/navbar.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'blooks/aside.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include 'blooks/content-header.php' ?>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <?php
            if (isset($_GET["module"])) {
                $module = $_GET["module"];
                $action = null;

                if (isset($_GET["action"])) {
                    $action = $_GET["action"];
                } else {
                    $action = "index";
                }

                if (file_exists("modules/$module/$action.php")) {
                    include "model/$module.php";
                    include "modules/$module/$action.php";
                } else {
                    header("location:error.php");
                    exit();
                }
            } else {
                include 'modules/dashboard/index.php';
            }
            ?>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'blooks/footer.php' ?>

    <!-- Control Sidebar -->
    <?php include 'blooks/control-sidebar.php' ?>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include 'blooks/foot.php' ?>
</body>
</html>