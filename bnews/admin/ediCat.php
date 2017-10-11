<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; 
?>
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';

?>
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm danh mục tin </span></h2>
			<?php
			$id_cat=$_GET['id'];
			?>
		 <div class="module-body">
		 	<?php
		 		if(isset($_POST['sua'])){
		 			$name=$_POST['name'];
		 			$query="UPDATE category SET name='{$name}' WHERE id_cat={$id_cat}";
		 			$result=$mysqli->query($query);
		 			if($result){
		 				header('location:indexCat.php?msg=Sửa thành công');
		 				exit();
		 			}else{
		 				echo "Có lỗi khi sửa!";
		 				die();
		 			}
		 			
		 		}
		 	?>
		 	<?php
		 	
		 	?>
			<form action="" method="POST" enctype="multipart/form-data">
				<p>
					<label>Tên danh mục tin </label>
					<input type="text" name="name" value="" class="input-medium" />
				</p>
				
				<fieldset>
					<input class="submit-green" name="sua" type="submit" value="Thêm" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
		 </div> <!-- End .module-body -->

	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php';
?>    