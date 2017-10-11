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
				$id_user=$_GET['id'];
		 		$query1="SELECT * FROM users WHERE id_user={$id_user}";
		 		$result1=$mysqli->query($query1);
		 		$arUser=mysqli_fetch_assoc($result1);
		 		$username=$arUser['username'];
		 		
		 		$fullname=$arUser['fullname'];
		 	?>
		 <div class="module-body">
		 	<?php
		 		if(isset($_POST['sua'])){
		 			$username=$_POST['username'];
		 			$password=$_POST['password'];
		 			$fullname=$_POST['fullname'];
		 			if($password==''){
		 				
		 				$query="UPDATE users SET username='{$username}',fullname='{$fullname}' WHERE id_user={$id_user}";
		 				$result=$mysqli->query($query);
		 				if($result){
		 					header('location:indexUser.php?msg=Sửa thành công');
		 					exit();
		 				}else{
		 					echo "Có lỗi khi sửa!";
		 					die();
		 					}
		 			}else {

		 				$password_mahoa=md5($password);
		 				$query="UPDATE users SET username='{$username}',password='{$password_mahoa}',fullname='{$fullname}' WHERE id_user={$id_user}";
		 				$result=$mysqli->query($query);
		 				if($result){
		 					header('location:indexUser.php?msg=Sửa thành công');
		 					exit();
		 				}else{
		 					echo "Có lỗi khi sửa!";
		 					die();
		 					}
		 			}
		 			
		 			
		 		}
		 	?>
		 	
			<form action="" method="POST" enctype="multipart/form-data" id="form">
				<p>
					<label>username </label>
						<?php
							if($username!='admin'){
						?>
							<input type="text" name="username"  value="<?php echo $username ?>" class="input-medium" />
						<?php }else{
							echo "<strong style='color:red'>".$username."</strong>";
						?>
							</br>
							</p>
							<input type="hidden" name="username"  value="<?php echo $username ?>" class="input-medium"/>

							
							<?php	} ?>
						
				</p>
					<p>
					<label>password </label>
					<input type="password" name="password" value="" class="input-medium" />
				</p>
					<p>
					<label>fullname </label>
					<input type="text" name="fullname" value="<?php echo $fullname ?>" class="input-medium" />
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
					username: {
						required: true,
						minlength:3,
						maxlength:32,
						
					},
					
					password: {
						
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