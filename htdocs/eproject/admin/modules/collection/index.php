<div class="card">
    <div class="card-header">
        <h3 class="card-title">Collection list</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Collection name</th>
                <th>Catagory</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            <?php
            $collections = get_all_collection ($conn);
            foreach ($collections as $collection) {
                ?>
                <tr>
                    <td>
                        <img onerror="imgError(this);" src="../public/upload/<?php echo $collection["image"] ?>" width="80px" />
                    </td>
                    <td><?php echo $collection["name"] ?></td>
                    <td><?php echo $collection["cname"] ?></td>
                    <td><a onclick="if (!confirm('Are you sure you want to delete this collection?')) return false;" href="index.php?module=collection&action=delete&id=<?php echo $collection["id"] ?>">Delete</a></td>
                    <td><a href="index.php?module=collection&action=edit&id=<?php echo $collection["id"] ?>">Edit</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Image</th>
                <th>Collection name</th>
                <th>Catagory</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->