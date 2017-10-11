<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/header.php";
?>
<!---//End-banner---->
<div class="contact">
	 <div class="container">
		 <div class="contact-head">
			 <h3>Liên hệ</h3>
			 <?php 
			  
			 if(isset($_POST['submit'])){
					 $name=$_POST['name'];
					 $email=$_POST['email'];
					 $phone=$_POST['phone'];
					 $message=$_POST['message'];

					 $queryLH="INSERT INTO contact(name,email,phone,content)
					                   VALUE('{$name}','{$email}','{$phone}','{$message}') ";
					
				    $resultLH=$mysqli->query($queryLH);
				    if($resultLH){
				    	echo "<strong style='color:blue' >Đã gửi thành công!</strong>";
				    }else{
				    	echo "<strong style='color:red' >Có lỗi khi gửi</strong>";
				    }

			
			
			 }
			 
			 
			 ?>
			  <form method="post" id="form">
				  <div class="col-md-6 contact-left">
						<input type="text" placeholder="Name" required="" name="name">
						<input type="text" placeholder="E-mail" required="" name="email">
						<input type="text" placeholder="Phone" required="" name="phone">
				 </div>
				 <div class="col-md-6 contact-right">
						 <textarea placeholder="Message" name="message"></textarea>
						 <input type="submit" value="SEND" name ="submit">
				 </div>
				 <div class="clearfix"></div>
			 </form>
			 
		 </div>
	 </div>
</div>

<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/footer.php";
?>
