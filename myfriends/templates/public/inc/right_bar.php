<?php

    require_once $_SERVER["DOCUMENT_ROOT"]."/functions/connectDB.php";
?>

<div class="col-md-4 content-main-right">
				 <div class="search">
						 <h3>TÌM BẠN TÔI</h3>
						<?php
							if(isset($_POST['timkiem'])){
								$search_name=$_POST['name'];
								$url='/'.$search_name.'.sea';
								header("location:$url");
								
							
							}

						?>

						<form action="" method="POST" id="form">
							<input type="text" name="name" placeholder="Nhập vào tên tìm kiếm"  value="">
							<input type="submit" name="timkiem" value="">
						</form>
						       <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#form").validate({
                                        rules: {
                                            "name": {
                                                required: true,
                                                
                                            },

                                            
                                        },
                                        messages: {
                                            "name": {
                                                required: "<strong style='color:red'>Vui lòng nhập tên tìm kiếm!</strong>",
                                                
                                            }
                                            
                                        }
                                    });
                                });
                            </script> 
					 
				 </div>
				 
				 <div class="categories">
					 <h3>DANH MỤC BẠN BÈ</h3>
					<?php 
					 $query="SELECT * FROM friend_list";
					 $result=$mysqli -> query($query);
					 while($arDMBB=mysqli_fetch_assoc($result)){
						 $fl_id=$arDMBB['fl_id'];
						 $fl_name=$arDMBB['fl_name'];
						 $new_name=convertUtf8ToLatin($fl_name);
						 $url='/'.$new_name.'-'.$fl_id;
						 
					 ?>
					 <li><a href="<?php echo $url; ?>"><?php echo $fl_name; ?></a></li>
					 
					 <?php } ?>
				 
				 <div class="archives">
					 <h3>Liên kết VinaEnter</h3>
					 <li class="active"><a href="http://vinaenter.edu.vn/lap-trinh-php-tu-az.html" target="_blank"><img width="100%" src="/templates/public/images/php.png" alt="" /></a></li>
					 <li><a href="http://vinaenter.edu.vn/lap-trinh-java-tu-az.html" target="_blank"><img width="100%" src="/templates/public/images/java.png" alt="" /></a></li>
					 <li><a href="http://vinaenter.edu.vn/lap-trinh-android-tu-az.html" target="_blank"><img width="100%" src="/templates/public/images/android.png" alt="" /></a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>

		 </div>

