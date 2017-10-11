<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/header.php";
?>
<?php
	$cid=$_GET['cid'];

	$queryTSD="SELECT count(fid) AS tongsodong FROM friends WHERE friend_list_id={$cid}";

	$resultTSD=$mysqli->query($queryTSD);
	$arTSD=mysqli_fetch_assoc($resultTSD);
	$tongsodong=$arTSD['tongsodong'];
		

	$row_count=ROW_COUNTDM;

	
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

	  <?php
	  
	 
	   $queryNNB="SELECT * FROM friend_list WHERE fl_id={$cid}";
	   $resultNNB=$mysqli -> query($queryNNB);
	   $arNNB=mysqli_fetch_assoc($resultNNB);
		$fl_name=$arNNB['fl_name'];
		$new_nameDM=convertUtf8ToLatin($fl_name);
		   
	   ?>
            <h1 class="title"><span>Những người bạn >> </span><?php echo  $fl_name; ?></h1>
	  
				 
			    <div class="content-grid-sec">
					 <div class="content-sec-info">
				<?php 
					 $cid=$_GET['cid'];
					
					 $queryFr="SELECT * FROM friends  WHERE friend_list_id= {$cid} ORDER BY fid DESC LIMIT {$offset},{$row_count}";
					 
					 
					 $resultFr=$mysqli -> query($queryFr);
					 while($arFr=mysqli_fetch_assoc($resultFr)){
						 $fid=$arFr['fid'];
						 $fname=$arFr['fname'];
					 	 $date_create=$arFr['date_create'];
					 	 $fread=$arFr['fread'];
						 $preview=$arFr['preview'];
						 $picture=$arFr['picture'];
						 $new_name=convertUtf8ToLatin($fname);
						 
						 $url='/'.$new_name.'-'.$fid.'.html';

						 
			    ?>
					
					 
							 <h3><a href="<?php echo $url; ?>"><?php echo  $fname; ?></a></h3>
							 <h4>Đăng ngày: <?php echo $date_create; ?> - Lượt xem: <?php echo $fread; ?></h4>
							 <p><?php echo $preview; ?> </p>
							 <img src="/files/<?php echo $picture; ?>" alt=""/>
							 <a class="bttn" href="chi-tiet.php?fid=<?php echo $fid ?>">Chi tiết bạn tôi</a>
							 
					  <?php } ?>	
					 </div>
				 </div>
				 
				 <div class="pages">
					 <ul>
						 

						 <?php
					 			if($current_page>1&&$sotrang>1){
					 				$previous=$current_page-1;
					 				$url_previous='/'.$new_nameDM.'-'.$cid.'-page'.$previous;
					 		?>
    							<li>
      								  <a href="<?php echo $url_previous; ?>">Previous</a>
   								 </li>

   							 <?php } ?>



   							<?php 
							for($i=1;$i<=$sotrang;$i++){
								if($i==$current_page){
									$active="class='active'";
								}else{
									$active="";
								}
								$urlmiddle='/'.$new_nameDM.'-'.$cid.'-page'.$i;
						    ?>

    						<li <?php echo $active;?>>
       							 <a href="<?php echo $urlmiddle; ?>">Trang <?php echo $i;?></a>
    						</li>


   							 <?php } ?>



    						<?php
					 			if($current_page<$sotrang&&$sotrang>1){
					 				$next=$current_page+1;
					 				$url_next='/'.$new_nameDM.'-'.$cid.'-page'.$next;
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

  			  
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>

<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/templates/public/inc/footer.php";
?>
