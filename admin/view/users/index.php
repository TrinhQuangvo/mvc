<?php if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
    require_once(PATH_PUBLIC . '/template/admin/header.php');
?>
<div class="container">
    <div class="row">
        <h3>Danh sach user</h3>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>status</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($list_user as $user) { ?>
          <tr>
            <td><?=increment_once($index); ?></td>
            <td><?=$user->email?></td>
            <td><?=$user->role?></td>
            <td><?=$user->status?></td>
            <td><a href="admin.php?c=user&a=edit&id=<?=$user->id?>">Edit</a></td>
            <td><a href="admin.php?c=user&a=delete&id=<?=$user->id?>">Delete</a</td>
          </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php');?>
