<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/header.php';
?>
<div class="leftpanel">
	<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/left_bar.php';
	 ?>
</div>
<div class="rightpanel">
	<div class="rightbody">
		<?php
		$id=$_GET['id_news'];

		$query="SELECT * FROM news WHERE id_news={$id}";
		$result=$mysqli->query($query);
		$arTT=mysqli_fetch_assoc($result);
		$name=$arTT['name'];
		$cid=$arTT['id_cat'];
		$detail_text=$arTT['detail_text'];
		$picture=$arTT['picture'];
		?>
		<h1 class="title"><?php echo $name ?></h1>
		<div class="items-new">
			<?php
				if($picture!=""){

				
			?>
			<img src="/files/<?php echo $picture ?>" alt="Trung Quốc điều thêm 17 tàu đến khu vực giàn khoan">
			<?php } ?>
			<div class="new-detail">
				<?php echo $detail_text ?>
			</div>
		</div>
		
		<h2 class="title" style="margin-top:30px;color:#BBB">Tin tức liên quan</h2>
		<div class="items-new">
			<ul>
			<?php
				
			
				$query="SELECT * FROM news WHERE id_cat={$cid} AND id_news!= {$id} ORDER BY id_news DESC LIMIT 2";
				$result=$mysqli->query($query);
				
				while($arTT=mysqli_fetch_assoc($result)){
					$name=$arTT['name'];
					$id_news=$arTT['id_news'];
					
					$preview_text=$arTT['preview_text'];
					$picture=$arTT['picture'];
					$new_name=convertUtf8ToLatin($name);
					$url='/'.$new_name.'-'.$id_news.'.html';
					

					?>
				<li>
					<h2>
						<a href="<?php echo $url; ?>" title="Trung Quốc điều thêm 17 tàu đến khu vực giàn khoan"><?php echo $name ?></a>
					</h2>
					<div class="item">
						<a href="<?php echo $url; ?>" title="Trung Quốc điều thêm 17 tàu đến khu vực giàn khoan"><img src="/files/<?php echo $picture ?>" alt="Trung Quốc điều thêm 17 tàu đến khu vực giàn khoan"></a>
						<p><?php echo $preview_text ?></p>
						<div class="clr"></div>
					</div>
				</li>
				 		<?php } ?>
				    
			
			</ul>
		</div>
	</div>
</div>
<div class="clr"></div>
<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/footer.php';
?>