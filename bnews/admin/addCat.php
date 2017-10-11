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
			
		 <div class="module-body">
		 	<?php
		 		if(isset($_POST['them'])){
		 			$name=$_POST['name'];
		 			$query="INSERT INTO category(name) VALUES('{$name}')";
		 			$result=$mysqli->query($query);
		 			if($result){
		 				header('location:indexCat.php?msg=Thêm thành công');
		 				exit();
		 			}else{
		 				echo "Có lỗi khi thêm dữ liệu";
		 				die();
		 			}
		 			
		 		}
		 	?>
	
			<form action="" method="POST"  id="form">
				<p>
					<label>Tên danh mục tin </label>
					<input type="text" name="name" value="" class="input-medium" />
				</p>
				
				<fieldset>
					<input class="submit-green" name="them" type="submit" value="Thêm" /> 
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