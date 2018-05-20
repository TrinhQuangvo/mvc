<?php if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
    require_once(PATH_PUBLIC . '/template/admin/header.php');
?>
            <div class="container">
                <div class="container-fluid">
					<form method="post" action="admin.php">
						<input type="hidden" name="id" value="<?= $playlist->id; ?>">
						<input type="hidden" name="c" value="playlist">
						<input type="hidden" name="a" value="update">
						<div class="row">   		
							<h2>Edit playlist</h2>
						</div>
						<div class="row">   		
							<label>User:</label>
						</div>
						<div class="row">
							<select class="form-control p-2 m-2" name="user_id">
                            <?php
                                foreach ($list_user as $value):

                                    $user = (array)$value;
                                    $id = $user['id'];
                                    $id_user = $playlist->user_id;
                                    $name = $user['email'];
                                    if ($id_user == $id) {
                                        echo "<option value='$id' selected>$name
                                        </option>";
                                    }else {
                                        echo "<option value='$id'> $name
                                        </option>";
                                    }
                                endforeach         
                                ?>
							</select>
						</div>
						<div class="row">   		
							<label>Tên :</label>
						</div>
						<div class="row">   	
							<input type="text" class="form-control p-2 m-2" name="name" value="<?=$playlist->name ?>">
						</div>
						<div class="row">   		
							<label>Ảnh:</label>
						</div>
                        <div class="row"><input class="form-control p2-m2" type="text" value="<?=$playlist->image?>" name="img" id=""></div>
						<div class="row">
                            <input type="submit" value="Sửa">
                        </div>
                    </form>
                </div>
            </div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>