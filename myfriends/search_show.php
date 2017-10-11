<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/header.php";
?>

<!---//End-banner---->
<div class="content">
	 <div class="container">
		 <div class="content-grids">
		     
		     	 <div class="col-md-8 content-main">				 
				 <h1 class="title">Những người bạn</h1>
				 	 <?php
				 
				 	 	$name=$_GET['search_name'];

					 	$query="SELECT * FROM friends WHERE fname LIKE '%$name%' ORDER BY fid DESC ";
					    $result=$mysqli->query($query);
					 	
					 	$querySoTin="SELECT count(fid) AS sotin FROM friends WHERE fname LIKE '%$name%'";
					 	$resultSoTin=$mysqli->query($querySoTin);
					 	$arSoTin=mysqli_fetch_assoc($resultSoTin);
					 	
					 	echo '<strong style="color:blue;font-size:20px ">Kết quả tìm kiếm:'.$arSoTin['sotin'].' tin</strong>';
					 	
					 	while($arFriends=mysqli_fetch_assoc($result)){
					 		$fid=$arFriends['fid'];
					 		$fname=$arFriends['fname'];
					 		$preview=$arFriends['preview'];
					 		$date_create=$arFriends['date_create'];
					 		$fread=$arFriends['fread'];
					 		$picture=$arFriends['picture'];
					 		$new_name=convertUtf8ToLatin($fname);
						 
						 	$url='/'.$new_name.'-'.$fid.'.html';
		
					 ?>

				 <div class="content-grid-sec">
					 <div class="content-sec-info">
							 <h3><a href="<?php echo $url; ?>"><?php echo $fname; ?></a></h3>
							 <h4>Đăng ngày: <?php echo $date_create; ?> - Lượt xem: <?php echo $fread; ?></h4>
							 <p><?php echo $preview; ?> </p>
							 <?php
							 	if($picture!=""){
							 ?>
							 <img src="/files/<?php echo $picture; ?>" alt=""/>
							 <?php } ?>
							 <a class="bttn" href="chi-tiet.html">Chi tiết bạn tôi</a>
					 </div>
				 </div>
				 <?php } ?>
				 
				 <div class="pages">
					 <ul>
						 	
						 <li>
						 <a href="" >Trang 1</a>
						 </li>

						 
					 </ul>
				 </div>				 
			 </div>



			 <?php
  				  require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/right_bar.php";
  			  ?>
			 
	 </div>
</div>
<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/footer.php";
    ob_end_flush();
?>
