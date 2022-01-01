<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product list</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product name</th>
                <th>Catagory</th>
                <th>Price</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
            <?php
            $products = get_all_product ($conn);
            foreach ($products as $product) {
                ?>
                <tr>
                    <td>
                        <img onerror="imgError(this);" src="../public/upload/<?php echo $product["image"] ?>" width="80px" />
                    </td>
                    <td><?php echo $product["name"] ?></td>
                    <td><?php echo $product["cname"] ?></td>
                    <td><?php echo number_format($product["price"],0,"",".") ?></td>
                    <td>
                        <?php
                        if ($product["status"] == 1) {
                            echo '<div class="badge badge-primary">Show</div>';
                        } else {
                            echo '<div class="badge badge-secondary">Not show</div>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($product["featured"] == 1) {
                            echo '<div class="badge badge-primary">Featuredt</div>';
                        } else {
                            echo '<div class="badge badge-secondary">Not featured</div>';
                        }
                        ?>
                    </td>
                    <td><a onclick="if (!confirm('Are you sure you want to delete this product?')) return false;" href="index.php?module=product&action=delete&id=<?php echo $product["id"] ?>">Delete</a></td>
                    <td><a href="index.php?module=product&action=edit&id=<?php echo $product["id"] ?>">Edit</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->