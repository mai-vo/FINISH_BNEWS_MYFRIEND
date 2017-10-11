<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/header.php';
?>

<?php
	//đếm dòng dữ liệu trong cơ sở dữ liệu
	$queryTSD="SELECT count(id_news) AS tongsodong FROM news";
	$resultTSD=$mysqli->query($queryTSD);
	$arTSD=mysqli_fetch_assoc($resultTSD);
	$tongsodong=$arTSD['tongsodong'];
	
	$row_count=ROW_COUNT;
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
<div class="leftpanel">
	<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/left_bar.php';
	 ?>
</div>
<div class="rightpanel">
	<div class="rightbody">
		<h1 class="title">Tin tức</h1>
		<div class="items-new">
			<ul>
			    <?php
			    	$query="SELECT * FROM news ORDER BY id_news DESC LIMIT {$offset},{$row_count}";
			    	$result=$mysqli->query($query);
			    	while($arNews=mysqli_fetch_assoc($result)){
			    		$id_news=$arNews['id_news'];
			    		$name=$arNews['name'];
			    		$preview_text=$arNews['preview_text'];
			    		$id_cat=$arNews['id_cat'];
			    		$picture=$arNews['picture'];
			    		$new_name=convertUtf8ToLatin($name);
			    		$url='/'.$new_name.'-'.$id_news.'.html';
			    ?>
				<li>
					<h2>
						<a href="<?php echo $url; ?>" title=""><?php echo $name; ?></a>
					</h2>
					<div class="item">
					<?php
						if($picture!=""){

						
					?>
						<a href="chitiet.php?id_news=<?php echo $id_news; ?>" title=""><img src="/files/<?php echo $picture; ?>" alt="" /></a>
					<?php } ?>	
						<p><?php echo $preview_text; ?></p>
						<div class="clr"></div>
					</div>
				</li>
				
				<?php } ?>
			</ul>
			
			<div class="paginator">
				<?php
					if($current_page>1&&$sotrang>1){
						$previous=$current_page-1;
						$url_previous='page-'.$previous.'.ok';

				?>		
						<a href="<?php echo $url_previous;?>"><<--Previous</a>
				<?php } ?>

				
				<?php

					for($i=1;$i<=$sotrang;$i++){

					if($current_page==$i){
						$active="class='active'";
					}else{
						$active=null;
					}
					$url='page-'.$i.'.ok';
				?>
				|<a href="<?php echo $url; ?>" <?php echo $active; ?>>Trang <?php echo $i;?></a>
				<?php } ?>


				<?php
					if($current_page<$sotrang&&$sotrang>1){
						$next=$current_page+1;
						$url_next='page-'.$next.'.ok';

				?>		
						<a href="<?php echo $url_next;?>">Next-->></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="clr"></div>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/footer.php';
?>		
			
			
