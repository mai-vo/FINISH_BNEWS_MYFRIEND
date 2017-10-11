<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/header.php";
?>
<!---//End-banner---->
<div class="content">
	 <div class="container">
		 <div class="content-grids">
	           
		      <div class="col-md-8 content-main">
				 <div class="content-grid">
					 <div class="content-grid-head">
					  <?php 
					  $fid=$_GET['fid'];
					 
					  //để lấy key của danh mục tinh nào
					  $query="SELECT * FROM friends WHERE fid={$fid}";
					  $result=$mysqli-> query($query);
					   $ar=mysqli_fetch_assoc($result);
					   $friend_list_id=$ar['friend_list_id'];// key để truyền xuống dưới để biết được danh mục tin nào
					   $fread=$ar['fread'];
					   $date_create=$ar['date_create'];
					   
					   
					   

					  // để lấy loại danh mục
					   $query1="SELECT fl_name FROM friend_list WHERE fl_id={$friend_list_id}";
					   $result1=$mysqli-> query($query1);
					   $ar1=mysqli_fetch_assoc($result1);
					   $fl_name=$ar1['fl_name'];
					   
					  
					 ?>
						 <h3><?php echo $fl_name; ?></h3>
						 <h4>Đăng ngày: <?php echo $date_create ?> - Lượt xem: <?php echo $fread; ?></h4>
						 <div class="clearfix"></div>
					 </div>


					 <div class="content-grid-single">
				     <?php
					 $fid=$_GET['fid'];
					 
					 $query_CC="SELECT * FROM friends WHERE fid={$fid}";
					 $resultCC=$mysqli-> query($query_CC);
					 $arCC=mysqli_fetch_assoc($resultCC);
					 $name=$arCC['fname'];
					 $detail=$arCC['detail'];
					 $picture=$arCC['picture'];
					 $preview=$arCC['preview'];
					 $friend_list_id=$arCC['friend_list_id'];
					
					 ?>
						 <h3><?php echo $name ?></h3>
						 <div class="detail_text">
							 <span><?php echo $preview ?></span>
							 <img class="single-pic" src="/files/<?php echo $picture ; ?>" alt="">
							 <p><?php echo  $detail ?></p>
						 </div>
						 <div class="comments">
							 <h3>Bạn thân khác của tôi</h3>
							 <?php
							 	
							 	$query="SELECT * FROM friends WHERE friend_list_id={$friend_list_id} AND fid!={$fid} ORDER BY fid DESC LIMIT 2";
							 	
							 	$resultFriends=$mysqli->query($query);
							 	
							 	while($arFriends=mysqli_fetch_assoc($resultFriends)){
							 		$picture=$arFriends['picture'];
							 		$fname=$arFriends['fname'];
							 		$preview=$arFriends['preview'];
							 		$fid=$arFriends['fid'];
							 		$new_name=convertUtf8ToLatin($fname);
							 		$url1=''.$new_name.'-'.$fid.'.html';
							 		
							 ?>
							 <div class="comment-grid">
								 <img src="/files/<?php echo $picture ?>" alt="">
								 <div class="comment-info">
								 <h4><a href="<?php echo $url1;?> "><?php echo $fname ?></a></h4>
								 <p><?php echo $preview ?></p>
								 </div>
								 <div class="clearfix"></div>
							 </div>
							 		<?php } ?>
							    
							 
						</div>
					  </div>
					 
				 </div>			 			 
			 </div>
			 
			 
			 <?php 
  				  require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/right_bar.php";
  			  ?>
			  
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>

<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/footer.php";
?>
