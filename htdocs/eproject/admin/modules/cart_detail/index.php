<div class="card">
    <div class="card-header">
        <h3 class="card-title">Post list</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Product id</th>
                <th>Cart id</th>
                <th>Quantily</th>
                <th>Price</th>
                <th>Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
            <?php
            $carts = get_all_cart_detail($conn);
            foreach ($carts as $cart) {
                ?>
                <tr>
                    <td><?php echo $cart["product_id"] ?></td>
                    <td><?php echo $cart["cart_id"] ?></td>
                    <td><?php echo $cart["quantily"] ?></td>
                    <td><?php echo $cart["price"] ?></td>
                    <td><a onclick="if (!confirm('Are you sure you want to delete this post?')) return false;" href="index.php?module=cart_detail&action=delete&id=<?php echo $cart["id"] ?>">Delete</a></td>
                    <td><a href="index.php?module=cart_detail&action=edit&id=<?php echo $cart["id"] ?>">Edit</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Product id</th>
                <th>Cart id</th>
                <th>Quantily</th>
                <th>Price</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->