<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; 
?>
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm users</span></h2>
			
		 <div class="module-body">
		 	<?php
		 		if(isset($_POST['them'])){
		 			$username=$_POST['username'];
		 			$password=$_POST['password'];
		 			$mahoapassword=md5($password);
		 			$fullname=$_POST['fullname'];

		 			$query="INSERT INTO users(username,password,fullname) VALUES('{$username}','{$mahoapassword}','{$fullname}')";
		 			$result=$mysqli->query($query);
		 			if($result){
		 				header('location:indexUser.php?msg=Thêm thành công');
		 				exit();
		 			}else{
		 				echo "Có lỗi khi thêm dữ liệu";
		 				die();
		 			}
		 			
		 		}
		 	?>
			<form action="" method="POST" enctype="multipart/form-data" id="form">
				<p>
					<label>username </label>
					<input type="text" name="username" value="" class="input-medium" />
				</p>
				<p>
					<label>password </label>
					<input type="text" name="password" value="" class="input-medium" />
				</p>
				
				<p>
					<label>fullname </label>
					<input type="text" name="fullname" value="" class="input-medium" />
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
					username: {
						required: true,
						minlength:3,
						maxlength:32,
						
					},
					
					password: {
						required: true,
						minlength:6,
					},
					fullname: {
						required: true,
						
					},
					
				},
				messages: {
					username: {
						required: "<strong style='color:red'>Vui lòng nhập username</strong>",
						minlength: "<strong style='color:red'>Username có ít nhất 3 ký tự</strong>",
						maxlength: "<strong style='color:red'>Username có nhiều nhất 32 ký tự</strong>",
					},
					
					password: {
						required: "<strong style='color:red'>Vui lòng nhập password </strong>",
						minlength: "<strong style='color:red'>password có ít nhất 6 ký tự</strong>",
						
					},
					fullname: {
						required: "<strong style='color:red'>Vui lòng nhập fullname </strong>",
						
					},
					
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