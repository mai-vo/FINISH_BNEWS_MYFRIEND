<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php';
?>
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';

?>
<!-- Form elements -->    
<div class="grid_12">

	<div class="module">
		 <h2><span>Sửa tin tức</span></h2>
		 <?php 
		 	$id=$_GET['id'];
		 	$query="SELECT * FROM news WHERE id_news={$id}";
		 	$result=$mysqli->query($query);
		 	$arNew=mysqli_fetch_assoc($result);
		 ?>
			
		 <div class="module-body">
		 		<?php
		 			if(isset($_POST['sua'])){
		 				$tentin=$_POST['tentin'];
		 				$danhmuc=$_POST['danhmuc'];
		 				$hinhanh=$_FILES['hinhanh']['name'];
		 				$mota=$_POST['mota'];
		 				$chitiet=$_POST['chitiet'];
		 				if($hinhanh==''){
		 					$query_nopic="UPDATE news SET name='{$tentin}',id_cat='{$danhmuc}',preview_text='{$mota}',detail_text='{$chitiet}' WHERE id_news={$id}";	
		 					$result_nopic=$mysqli->query($query_nopic);
		 					if($result_nopic){
		 						header('location:indexNews.php?msg=Sửa thành công !');
		 					}else{
		 						echo "Có lỗi khi sửa ";
		 						die();
		 					}
		 				}else{
		 					$tmp_name=$_FILES['hinhanh']['tmp_name'];
		 					//doi tên hình
		 					$tmp=explode('.',$hinhanh);
		 					$duoiFile=end($tmp);
		 					$newPic='VNE-'.time().'.'.$duoiFile;
		 					$pathUpload=$_SERVER['DOCUMENT_ROOT'].'/files/'.$newPic;
		 					$result_Pic=move_uploaded_file($tmp_name, $pathUpload);
		 					//tin cũ không hình
		 					if($arNew['picture']!=''){
		 						unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$arNew['picture']);

		 					}
		 					//tin cũ không hình
		 					$query_pic="UPDATE news SET name='{$tentin}',id_cat='{$danhmuc}',preview_text='{$mota}',detail_text='{$chitiet}',picture='{$newPic}' WHERE id_news={$id}";
		 					$result_pic=$mysqli->query($query_pic);
		 					if($result_pic){
		 						header('location:indexNews.php?msg=Sửa thành công');
		 					}else{
		 						echo "Lỗi khi có sửa";
		 						die();
		 					}
		 				}
		 				

		 			}

		 		?>
			<form action="" method= "POST" enctype="multipart/form-data" id="form">
				<p>
					<label>Tên tin</label>
					<input type="text" name="tentin" value="<?php echo $arNew['name'] ?>" class="input-medium" />
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
								$selected='';
								if($id_cat==$arNew['id_cat']){
									$selected='selected=selected';

								}
						?>
						<option value="<?php echo $id_cat ?>" <?php echo $selected ?>><?php echo $name ?></option>
						<?php } ?>
					</select>
				</p>
					<?php 
						if($arNew['picture']!=''){
					?>
				<p>
					<label>Hình ảnh cũ </label>
					<img src="/files/<?php echo $arNew['picture'] ?>" >
					
				</p>
					<?php } ?>
				<p>
					<label>Hình ảnh</label>
					<input type="file"  name="hinhanh" value="" />
				</p>
				<p>

					<label>Mô tả</label><textarea name="mota" value="" rows="7" cols="90" class="input-medium"><?php echo $arNew['preview_text']; ?></textarea>
				</p>



				<p>
					<label>Chi tiết</label>
					<textarea  name="chitiet" value="" rows="7" cols="90" class="ckeditor" ><?php echo $arNew['detail_text']; ?>
					</textarea>

				</p>
				<fieldset>
					<input class="submit-green" name="sua" type="submit" value="Sửa" /> 
					<input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
				</fieldset>
			</form>
			<script type="text/javascript">
		$(document).ready(function(){
			$("#form").validate({
				ignore: [],
				rules: {
					tentin: {
						required: true,
						
					},
					
					mota: {
						required: true,
						
					},
					chitiet: {
						required: function(){
                        CKEDITOR.instances.chitiet.updateElement();
                    },
                    minlength:1,
						
					},
					
				},
				messages: {
					tentin: {
						required: "<strong style='color:red'>Vui lòng nhập tên tin</strong>",
					
					},
					
					mota: {
						required: "<strong style='color:red'>Vui lòng nhập mô tả</strong>",
						
					},
					chitiet: {
						required: "<strong style='color:red'>Vui lòng nhập chi tiết</strong>",
						
					},
					
				}
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