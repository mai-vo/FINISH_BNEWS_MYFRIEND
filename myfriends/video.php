<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/header.php";
?>
<?php
	$queryTSD="SELECT count(id) AS tongsodong FROM videos";
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
				 <h1 class="title">Video</h1>
				 <div class="content-grid-sec">
					 <div class="content-sec-info">
					 	<?php 
					 	 $queryVD="SELECT * FROM videos ORDER BY id DESC LIMIT {$offset},{$row_count}";
         				  $resultVD=$mysqli -> query($queryVD);
         				  
         				   
         				  while($arVD=mysqli_fetch_assoc($resultVD)){
		                   $vname=$arVD['vname'];
		                   $vcode=$arVD['vcode'];
		                   $date_create=$arVD['date_create'];
		                   
         				 ?>
							 <h3><a href="chi-tiet.html"><?php echo $vname ?></a></h3>
							 <h4>Đăng ngày: <?php echo $date_create ?></h4>
							 <iframe width="684" height="385" src="https://www.youtube.com/embed/<?php echo $vcode ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
							 <?php } ?>
					 </div>
				 </div>
				 
				 <div class="pages">
					 <ul>
						 	<?php 
							for($i=1;$i<=3;$i++){
								if($i==$current_page){
									$active="class='active'";
								}else{
									$active="";
								}
						?>
						 <li <?php echo $active;?>>
						 <a href="video.php?page=<?php echo $i; ?>" >Trang <?php echo $i;?></a>
						 </li>

						 
						 <?php } ?>
						 <?php 
						 	$next=$current_page+1;
						 	$previous=$current_page-1;
						 ?>
						 <?php 
						 	if($previous>0){
						 ?>
						 <li><a href="video.php?page=<?php echo $previous; ?>">Previous</a></li>
						 <?php } ?>
						 <li><a href="video.php?page=<?php echo $next; ?>">Next</a></li>
					 </ul>
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