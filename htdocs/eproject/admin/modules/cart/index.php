<div class="card">
    <div class="card-header">
        <h3 class="card-title">Post list</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Email</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Total_cart</th>
                <th>Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
            <?php
            $carts = get_all_cart($conn);
            foreach ($carts as $cart) {
                ?>
                <tr>
                    <td><?php echo $cart["email"] ?></td>
                    <td><?php echo $cart["fullname"] ?></td>
                    <td><?php echo $cart["address"] ?></td>
                    <td><?php echo $cart["phone"] ?></td>
                    <td><?php echo $cart["total_cart"] ?></td>
                    <td><a onclick="if (!confirm('Are you sure you want to delete this post?')) return false;" href="index.php?module=cart&action=delete&id=<?php echo $cart["id"] ?>">Delete</a></td>
                    <td><a href="index.php?module=cart&action=edit&id=<?php echo $cart["id"] ?>">Edit</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Email</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Total_cart</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->