<?php if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
    require_once(PATH_PUBLIC . '/template/admin/header.php');
?>
            <div class="connamet">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-connamet table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                          <th>STT</th>
                                          <th>name</th>
                                          <th>user</th>
                                          <th>anh</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($list_playlist as $playlist) { ?>    
                                        <tr>
                                          <td><?=increment_once($index);?></td>
                                          <td><?=$playlist->name; ?></td>
                                          <td><?=$playlist->user_id?></td>
                                          <td><img src="<?=$playlist->image;?>" width="160" height="90"></img></td>      
                                          <td><a href="admin.php?c=playlist&a=edit&id=<?=$playlist->id; ?>">Edit</a></td>
                                          <td><a href="admin.php?c=playlist&a=delete&id=<?=$playlist->id; ?>">Delete</a></td>
                                        </tr>
                                      <?php } ?>
                                      </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>
