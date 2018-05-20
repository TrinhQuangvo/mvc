<?php if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
    require_once(PATH_PUBLIC . '/template/admin/header.php');
?>
            <div class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Danh Sách Chi Tiết Playlists</h4>
                                    <p class="category">cập nhật mới nhất</p>
                                </div>
                                <div class="card-connamet table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                          <th>STT</th>
                                          <th>playlist</th>
                                          <th>song</th>
                                          <th>Delete</th>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($list_chitietplaylist as $chitietplaylist) { ?>    
                                        <tr>
                                          <td><?php echo increment_once($index); ?></td>
                                            <?php 
                                                $arr = (array) $list_playlist;
                                                foreach ($arr as $key => $value) {
                                                    $playlist = (array) $value;
                                                    if ($playlist['id'] == $chitietplaylist->playlist_id)   
                                                    echo '<td> '. $playlist['name'] .' </td>';
                                                }
                                            ?>  

                                            <?php 
                                                $arr = (array) $list_song;
                                                foreach ($arr as $key => $value) {
                                                    $song = (array) $value;
                                                    if ($song['id'] == $chitietplaylist->song_id)   
                                                    echo '<td> '. $song['name'] .' </td>';
                                                }
                                            ?>  
                                          <td><a href="admin.php?c=chitietplaylist&a=delete&playlist_id=<?php echo $chitietplaylist->playlist_id; ?>&song_id=<?php echo $chitietplaylist->song_id; ?>">Delete</a></td>
                                        </tr>
                                      <?php } ?>
                                      </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-lg-8">   
                        <button class="btn btn-warning" type="submit" style="padding: 12px 0"><a href="admin.php?c=chitietplaylist&a=create" style="color: white; padding: 14px 30px;">Create</a></button>                          
                    </div>
                </div>
            </div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>