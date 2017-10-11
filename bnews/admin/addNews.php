<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php';
?>
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';

?>
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Thêm tin tức</span></h2>
			
		 <div class="module-body">
		 		<?php
		 			if(isset($_POST['them'])){
		 				$tentin=$_POST['tentin'];
		 				$danhmuc=$_POST['danhmuc'];
		 				$hinhanh=$_FILES['hinhanh']['name'];
		 				$mota=$_POST['mota'];
		 				$chitiet=$_POST['chitiet'];
		 				if($hinhanh==''){
		 					$query_nopic="INSERT INTO news(name,preview_text,detail_text,id_cat)
											VALUES('{$tentin}','{$mota}','{$chitiet}','{$danhmuc}')";
							$result_nopic=$mysqli->query($query_nopic);	
							if($result_nopic){
								header('location:indexNews.php?msg=Thêm thành công!');
								exit();

							}else{
								echo "Lỗi khi thêm hình";
								die();
							}			
		 				}else{
		 					//up hình
		 					$tmp_name=$_FILES['hinhanh']['tmp_name'];
		 					//doi tên hình
		 					$tmp=explode('.',$hinhanh);
		 					$duoiFile=end($tmp);
		 					$newPic='VNE-'.time().'.'.$duoiFile;
		 					$pathUpload=$_SERVER['DOCUMENT_ROOT'].'/files/'.$newPic;
		 					$result_Pic=move_uploaded_file($tmp_name, $pathUpload);
		 					if($result_Pic){
		 						//viết query
		 						$query="INSERT INTO news(name,preview_text,detail_text,id_cat,picture)
											VALUES('{$tentin}','{$mota}','{$chitiet}','{$danhmuc}','{$newPic}')";
								$result=$mysqli->query($query);
								if($result){
									header('location:indexNews.php?msg=Thêm thành công!');
								}else{
									echo "Có lỗi khi thêm tin có hình";	
									die();
								}			

		 					}else{
		 						echo "Có lỗi khi up hình";
		 						die();
		 					}
		 				}

		 			}

		 		?>
		
			
			<form action="" method= "POST" enctype="multipart/form-data" id="form">
				<p>
					<label>Tên tin</label>
					<input type="text" name="tentin" value="" class="input-medium" />
				</p>
				<p>
					<label>Danh mục tin</label>
					<select  name="danhmuc" class="input-short">
						<?php 
							$sql="SELECT * FROM category";
							$ketqua=$mysqli->query($sql);
							while($arCat=mysqli_fetch_assoc($ketqua)){
								$id_cat=$arCat['id_cat'];
								$name=$arCat['name'];
						?>
						<option value="<?php echo $id_cat ?>"><?php echo $name ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<label>Hình ảnh</label>
					<input type="file"  name="hinhanh" value="" />
				</p>
				<p>
					<label>Mô tả</label>
					<textarea name="mota" value="" rows="7" cols="90" class="input-medium"></textarea>
				</p>
				<p>
					<label>Chi tiết</label>
					<textarea  class="ckeditor" name="chitiet" value="" rows="7" cols="90" ></textarea>
				</p>
				<fieldset>
					<input class="submit-green" name="them" type="submit" value="Thêm" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
	
	<script>
    $( document ).ready( function () {

        $( "#form" ).validate( {
            ignore: [],
            debug: false,
            rules: {
                tentin: {
                    required: true,
                    
                },
                chitiet: {
                    required: function(){
                        CKEDITOR.instances.chitiet.updateElement();
                    },
                    minlength:1,
                },
                mota:{
                    required:true,
                  
                }
            },
            messages: {
                tentin: {
                    required: "<strong style='color:red'>Vui lòng nhập tên tin</strong>",
                   
                },
                chitiet: {
                    required: "<strong style='color:red'>Vui lòng nhập chi tiết</strong>",
                },
                mota:{
                    required: "<strong style='color:red'>Vui lòng nhập mô tả</strong>",
                }
            },
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