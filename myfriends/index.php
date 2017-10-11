<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/header.php";
?>
<?php
	$queryTSD="SELECT count(fid) AS tongsodong FROM friends";
	$resultTSD=$mysqli->query($queryTSD);
	$arTSD=mysqli_fetch_assoc($resultTSD);
	$tongsodong=$arTSD['tongsodong'];


	$row_count=ROW_COUNT;
	
	$sotrang=ceil($tongsodong/$row_count);
	

	if(isset($_GET['page'])){
		$current_page=$_GET['page'];
	}else{
		$current_page=1;
	}
	$offset=($current_page-1)*$row_count;
	

?>
<!---//End-banner---->
<div class="content">
	 <div class="container">
		 <div class="content-grids">
		     
		     	 <div class="col-md-8 content-main">				 
				 <h1 class="title">Những người bạn</h1>
				 	 <?php
					 	$query="SELECT * FROM friends ORDER BY fid DESC LIMIT {$offset},{$row_count}";
					 	
					 	$result=$mysqli->query($query);
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
							 <a class="bttn" href="<?php echo $url; ?>">Chi tiết bạn tôi</a>
					 </div>
				 </div>
				 <?php } ?>
				 
				 <div class="pages">
					 <ul>
					 		<?php
					 			if($current_page>1&&$sotrang>1){
					 				$previous=$current_page-1;
					 				$url_previous='/page-'.$previous.'.ok';
					 		?>
    							<li>
      								  <a href="<?php echo $url_previous; ?>">Previous</a>
   								 </li>

   							 <?php } ?>



   							<?php 
							for($i=1;$i<=5;$i++){
								if($i==$current_page){
									$active="class='active'";
								}else{
									$active="";
								}
								$url='page-'.$i.'.ok';
						    ?>

    						<li <?php echo $active;?>>
       							 <a href="<?php echo $url; ?>">Trang <?php echo $i;?></a>
    						</li>


   							 <?php } ?>

    						<?php
					 			if($current_page<$sotrang&&$sotrang>1){
					 				$next=$current_page+1;
					 				$url_next='page-'.$next.'.ok';
					 		?>
        <li>
            <a href="<?php echo $url_next; ?>">Next>></a>
        </li>

        <?php } ?>



						 
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
    ?>
