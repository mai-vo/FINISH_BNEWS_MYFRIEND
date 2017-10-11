 <?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/functions/connectDB.php";
?>
 <div class="contact-head">
			 <h3>Liên hệ</h3>
			 <?php 
			  
			 if(isset($_POST['submit'])){
			 $name=$_POST['name'];
			 $email=$_POST['email'];
			 $phone=$_POST['phone'];
			 $message=$_POST['message'];
			 $queryLH="INSERT INTO contact(name,email,phone,content)
			                   VALUE('{$name}','{$email}',{$phone},'{$message}') ";
			
		    $resultLH=$mysqli->query($queryLH);
			
			
			 }
			 
			 
			 ?>
			  <form method="post" >
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