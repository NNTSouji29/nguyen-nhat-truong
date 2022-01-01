<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
        <span class="brand-text font-weight-light">Nail Art</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION["login"]["email"] ?></a><br>
                <button type="button" class="btn btn-block btn-outline-secondary btn-sm"><a href="logout.php">Logout</a></button>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?module=category&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?module=category&action=index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?module=product&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?module=product&action=index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?module=user&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?module=user&action=index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?module=post&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?module=post&action=index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Cart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?module=cart&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Cart</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?module=cart&action=index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Cart</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Collection
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?module=collection&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Collection</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?module=collection&action=index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Collection</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Cart detail
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?module=cart_detail&action=create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Cart Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?module=cart_detail&action=index" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Cart detail</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>