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
		 		$query1="SELECT * FROM category WHERE id_cat={$id_cat}";
		 		$result1=$mysqli->query($query1);
		 		$arDM=mysqli_fetch_assoc($result1);
		 		$name=$arDM['name'];
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
		 	
			<form action="" method="POST" enctype="multipart/form-data" id="form">
				<p>
					<label>Tên danh mục tin </label>
					<input type="text" name="name" value="<?php echo $name ?>" class="input-medium" />
				</p>
				
				<fieldset>
					<input class="submit-green" name="sua" type="submit" value="Sửa" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
				<script type="text/javascript">
		$(document).ready(function(){
			$("#form").validate({
				rules: {
					"name": {
						required: true,
						
					},

					
				},
				messages: {
					"name": {
						required: "<strong style='color:red'>Vui lòng nhập danh mục</strong>",
						
					}
					
				}
			});
		});
	</script>
		 </div> <!-- End .module-body -->

	</div>  <!-- End .module -->
	<div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php';
?>    