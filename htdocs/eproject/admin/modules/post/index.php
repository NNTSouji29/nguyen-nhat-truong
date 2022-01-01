<div class="card">
    <div class="card-header">
        <h3 class="card-title">Post list</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            <?php
            $posts = get_all_post($conn);
            foreach ($posts as $post) {
                ?>
                <tr>
                    <td>
                        <img onerror="imgError(this);" src="../public/upload/<?php echo $post["image"] ?>" width="130px" />
                    </td>
                    <td><?php echo $post["title"] ?></td>
                    <td><?php echo $post["content"] ?></td>
                    <td><a onclick="if (!confirm('Are you sure you want to delete this post?')) return false;" href="index.php?module=post&action=delete&id=<?php echo $post["id"] ?>">Delete</a></td>
                    <td><a href="index.php?module=post&action=edit&id=<?php echo $post["id"] ?>">Edit</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->