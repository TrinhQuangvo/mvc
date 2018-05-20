<?php if ( ! defined('PATH_PUBLIC')) die ('Bad requested!');
    require_once(PATH_PUBLIC . '/template/admin/header.php');
?>
<div id="wrapper">
	<div class="container">
	    <form method="post" action="admin.php">
	    <input type="hidden" name="c" value="playlist">
	    <input type="hidden" name="a" value="store">
	    <div class="row">   		
	    	<h2>Thêm Mới</h2>
	    </div>
	    <div class="row">   		
	    	<label>Tên :</label>
	    </div>
	    <div class="row">   		
	    	<input type="text" class="form-control p-2 m-2" name="name">
	    </div>
		<div class="row">
			<label for="">Người Dùng</label>
		</div>
		<div class="row">   	
			<select class="form-control p-2 m-2" name="user_id">
				<?php foreach ($list_user as $key => $value) { 
					$arr = (array) $value;?>
                   <option value="<?php print_r($arr['id']); ?> "> <?php print_r($arr['email']);
                };?></option>
			</select>
			</div>
		</div>
		<div class="row">   		
	    	<label>Hình Ảnh</label>
	    </div>
	    <div class="row">   	
	    	<input type="text" class="form-control p-2 m-2" name="image">
	    </div>
	   
	    <div class="row">   
	    	<button class="btn btn-primary p-2 m-2" type="submit">Create</button>
	    </div>
	    </form>
	</div>
</div>
<?php require_once(PATH_PUBLIC . '/template/admin/footer.php'); ?>