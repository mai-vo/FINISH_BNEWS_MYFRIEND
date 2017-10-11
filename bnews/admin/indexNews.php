<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php';
?>
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';

?>
<?php
	//đếm dòng dữ liệu trong cơ sở dữ liệu
	$queryTSD="SELECT count(id_news) AS tongsodong FROM news";
	$resultTSD=$mysqli->query($queryTSD);
	$arTSD=mysqli_fetch_assoc($resultTSD);
	$tongsodong=$arTSD['tongsodong'];
	
	$row_count=ROW_COUNT1;
	
	//tổng số trang
	$sotrang=ceil($tongsodong/$row_count);
	
	//lấy trang hiện tại
	
	if(isset($_GET['page'])){
		$current_page=$_GET['page'];
	}else{
		$current_page=1;
	}
	$offset=($current_page-1)*$row_count;

?>
<div class="bottom-spacing">
	  <!-- Button -->
	  <div class="float-left">
		  <a href="addNews.php" class="button">
			<span>Thêm tin <img src="/templates/admin/images/plus-small.gif" alt="Thêm tin"></span>
		  </a>
	  </div>
	  <div class="clear"></div>
</div>

<div class="grid_12">
	<!-- Example table -->
	<div class="module">
		<h2><span>Danh sách tin</span></h2>
		<?php
		if(isset($_GET['msg'])){
		  	echo '<p style=color:red;font-weight:bold;>'.$_GET['msg'].'</p>';

		  	}
		?>
		
		<div class="module-table-body">
			<form action="">
			<table id="myTable" class="tablesorter">
				<thead>
					<tr>
						<th style="width:4%; text-align: center;">ID</th>
						<th>Tên</th>
						<th style="width:20%">Danh mục</th>
						<th style="width:16%; text-align: center;">Hình ảnh</th>
						<th style="width:11%; text-align: center;">Chức năng</th>
					</tr>
				</thead>
				<tbody>
						<?php
							$query="SELECT news.*,category.name AS cname
									 FROM news 
									JOIN category
									ON news.id_cat=category.id_cat
									ORDER BY id_news DESC LIMIT {$offset},{$row_count}";
									
							$result=$mysqli->query($query);
							while($arItem=mysqli_fetch_assoc($result)){
								$id_news=$arItem['id_news'];
								$name=$arItem['name'];
								$cname=$arItem['cname'];
								$picture=$arItem['picture'];
							

						?>
					<tr>
						<td class="align-center"><?php echo $id_news ?></td>
						<td><a href=""><?php echo $name ?></a></td>
						<td><?php echo $cname ?></td>
						<td align="center">
						<?php
							if($picture==""){
								echo "Không có hình";
							}else{
						?>
						<img src="/files/<?php echo $picture ?>" class="hoa" />
						<?php } ?>
						</td>
						<td align="center">
							<a href="editNews.php?id=<?php echo $id_news ?>">Sửa <img src="/templates/admin/images/pencil.gif" alt="edit" /></a>
							<a href="delNews.php?id=<?php echo $id_news ?>"onclick="return confirm('Bạn có chắn chắn xóa không ?');">Xóa <img src="/templates/admin/images/bin.gif" width="16" height="16" alt="delete" /></a>
						</td>
					</tr>
					
				   <?php } ?>
				</tbody>
			</table>
			</form>
		 </div> <!-- End .module-table-body -->
	</div> <!-- End .module -->
		 <div class="pagination">           
			<div class="numbers">
			<span>Trang:</span>
			 

			<?php
					if($current_page>1&&$sotrang>1){
						$previous=$current_page-1;
						

				?>		
						<a href="indexNews.php?page=<?php echo $previous;?>"><<--Previous</a>
				<?php } ?>

				
				<?php

					for($i=1;$i<=$sotrang;$i++){

					if($current_page==$i){
						$active="class='active'";
					}else{
						$active=null;
					}
					
				?>
				<a href="indexNews.php?page=<?php echo $i; ?>" <?php echo $active; ?>><?php echo $i;?></a>

				<span> | </span>
				<?php } ?>


				<?php
					if($current_page<$sotrang&&$sotrang>1){
						$next=$current_page+1;
						

				?>		
						<a href="indexNews.php?page=<?php echo $next;?>">Next-->></a>
				<?php } ?>
			</div> 
			<div style="clear: both;"></div> 
		 </div>
	
</div> <!-- End .grid_12 -->
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php';
?>    