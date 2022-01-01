<div class="card">
    <div class="card-header">
        <h3 class="card-title">List User</h3>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Authorityn</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $users = get_all_user ($conn);
            $stt = 0;
            foreach ($users as $user) {
                $stt++;
                ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td>
                        <?php
                        if ($user["id"] == 1) {
                            echo '<b><span class="text-danger">Superadmin</span></b>';
                        } elseif ($user["level"] == 1) {
                            echo '<span class="text-danger">Admin</span>';
                        } else {
                            echo '<span>Member</span>';
                        }

                        ?>
                    </td>
                    <td><a onclick="if (!confirm('Are you sure you want to delete this user?')) return false;" href="index.php?module=user&action=delete&id=<?php echo $user["id"] ?>">Delete</a></td>
                    <td><a href="index.php?module=user&action=edit&id=<?php echo $user["id"] ?>">Edit</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Authorityn</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->