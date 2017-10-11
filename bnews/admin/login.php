<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; 
 if(isset($_SESSION['arUser'])){
 	header('location:index.php');
 }
?>
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Đăng nhập</span></h2>
			
		 <div class="module-body">
		 	<?php
		 		if(isset($_POST['submit'])){
		 			$username=$_POST['username'];
		 			$password=$_POST['password'];
		 			$password=md5($password);
		 			$query="SELECT * FROM users WHERE username='{$username}' AND password='$password' LIMIT 1";
		 			$result=$mysqli->query($query);
		 			$arUser=mysqli_fetch_assoc($result);
		 			if($arUser==NULL){
		 				echo '<strong style="color:red">Sai username và password</strong>';
		 			}else{
		 				$_SESSION['arUser']=$arUser;
		 				header('location:index.php');
		 			}

		 			
		 		}
		 	?>
			<form action="" method="POST" id="form">
				<p>
					<label>Tên đăng nhập</label>
					<input type="text" name="username" value="" class="input-medium" />
				</p>
				<p>
					<label>Mật khẩu</label>
					<input type="password" name="password" value="" class="input-medium" />
				</p>
				
				
				
				
				<fieldset>
					<input class="submit-green" name="submit" type="submit" value="Đăng nhập" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
				<script type="text/javascript">
		$(document).ready(function(){
			$("#form").validate({
				rules: {
					"username": {
						required: true,
						
					},
					"password": {
						required: true,
						
					},

					
				},
				messages: {
					"username": {
						required: "<strong style='color:red'>Vui lòng nhập username! </strong>",
						
					},
					"password": {
						required: "<strong style='color:red'>Vui lòng nhập password! </strong>",
						
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