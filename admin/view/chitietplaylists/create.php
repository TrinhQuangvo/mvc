<?php if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
    require_once(PATH_PUBLIC . '/template/admin/header.php');
?>
            <div class="container">
                <div class="container-fluid">
					<form method="post" action="admin.php">
						<input type="hidden" name="c" value="chitietplaylist">
						<input type="hidden" name="a" value="store">
						<div class="row">   		
							<h2>Create Playlist</h2>
						</div>		
						<div class="row">   		
							<label>Chọn List:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="playlist_id">
                                <?php foreach ($list_playlist as $key => $value) {
                                    $arr = (array) $value;?>
                                    <option value="<?php print_r($arr['id']); ?> "> <?php print_r($arr['name']) ; }?></option>
							</select>
						</div>
						<div class="row">   		
							<label>bai hat:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="song_id">
                                <?php foreach ($list_song as $key => $value) {
                                    $arr = (array) $value;?>
                                    <option value="<?php print_r($arr['id']); ?> "> <?php print_r($arr['name']) ; }?></option>
							</select>
						</div>
						<div class="row">   
                            <button class="btn btn-warning p-2 m-2" onclick="demo.showNotification('top','left')">Apply</button>
							<button class="btn btn-warning p-2 m-2" type="submit" style="padding: 12px 0"><a href="admin.php?c=chitietplaylist" style="color: white; padding: 14px 30px;">Cancel</a></button>                          
						</div>
					</form>
				</div>
			</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>