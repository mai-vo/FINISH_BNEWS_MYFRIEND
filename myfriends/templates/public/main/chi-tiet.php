<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/functions/connectDB.php";
?>
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
					   $read=$ar['read'];
					   $date_create=$ar['date_create'];
					   
					   
					   

					  // để lấy loại danh mục
					   $query1="SELECT fl_name FROM friend_list WHERE fl_id={$friend_list_id}";
					   $result1=$mysqli-> query($query1);
					   $ar1=mysqli_fetch_assoc($result1);
					   $fl_name=$ar1['fl_name'];
					   
					  
					 ?>
						 <h3><?php echo $fl_name; ?></h3>
						 <h4>Đăng ngày: <?php echo $date_create ?> - Lượt xem: <?php echo $read; ?></h4>
						 <div class="clearfix"></div>
					 </div>


					 <div class="content-grid-single">
						     <?php
					 $fid=$_GET['fid'];
					 
					 $query_CC="SELECT fname, detail,preview, picture FROM friends WHERE fid={$fid}";
					 $resultCC=$mysqli-> query($query_CC);
					 $arCC=mysqli_fetch_assoc($resultCC);
					 $name=$arCC['fname'];
					 $detail=$arCC['detail'];
					 $picture=$arCC['picture'];
					 $preview=$arCC['preview'];
					
					
					 ?>
						 <h3><?php echo $name ?></h3>
						 <div class="detail_text">
							 <span><?php echo $preview ?></span>
							 <img class="single-pic" src="/templates/public/images/<?php echo $picture ; ?>" alt="">
							 <p><?php echo  $detail ?></p>
						 </div>
						 <div class="comments">
							 <h3>Bạn thân khác của tôi</h3>
							 <div class="comment-grid">
								 <img src="/templates/public/images/anh2.jpg" alt="">
								 <div class="comment-info">
								 <h4><a href="chi-tiet.html">Nguyễn Văn Hùng</a></h4>
								 <p>Hùng sinh ra trong một gia đình giỏi IT. Bố Hùng hiện đang là cố vấn sản phẩm chủ lực của Microsoft. Mẹ cũng là 1 lập trình viên cừ khôi tại tập đoàn VinaEnter.</p>
								 </div>
								 <div class="clearfix"></div>
							 </div>
							 
							 <div class="comment-grid">
								 <img src="/templates/public/images/anh1.jpg" alt="">
								 <div class="comment-info">
								 <h4><a href="chi-tiet.html">Trần Nguyễn Gia Huy</a></h4>
								 <p>Huy là bạn của tôi hồi còn mẫu giáo. Tôi còn nhớ cậu nói: Bạn thích ăn kẹo không mình mang đến cho...</p>
								 </div>
								 <div class="clearfix"></div>
							 </div>	
						</div>
					  </div>
					 
				 </div>			 			 
			 </div>