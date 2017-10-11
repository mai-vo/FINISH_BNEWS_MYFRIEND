<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/header.php';
?>
<?php
	//đếm dòng dữ liệu trong cơ sở dữ liệu
	$cid=$_GET['id'];
	$queryTSD="SELECT count(id_news) AS tongsodong FROM news WHERE id_cat={$cid} ";
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
    <?php
					
					$query="SELECT * FROM category WHERE id_cat={$cid}";
					$result=$mysqli->query($query);
					$arDM=mysqli_fetch_assoc($result);
					$name=$arDM['name'];
					$new_nameCat=convertUtf8ToLatin($name);
				?>
        <div class="rightpanel">
            <div class="rightbody">
                <h1 class="title">Tin tức >>
                    <?php echo $name ?>
                </h1>
                <div class="items-new">
                    <ul>
                        <?php 
								$query="SELECT * FROM news WHERE id_cat={$cid} ORDER BY id_news DESC LIMIT {$offset},{$row_count}";
							
								$result=$mysqli->query($query);
								while($arTT=mysqli_fetch_assoc($result)){
									$id_news=$arTT['id_news'];
									$name=$arTT['name'];
									$preview_text=$arTT['preview_text'];
									$picture=$arTT['picture'];
									$new_name=convertUtf8ToLatin($name);
									$url='/'.$new_name.'-'.$id_news.'.html';

								
							?>
                        <li>
                            <h2>
                                <a href="<?php echo $url; ?>" title="">
                                    <?php echo $name ?>
                                </a>
                            </h2>
                            <div class="item">
                                <?php 
										if($picture!=""){

										
									?>
                                <a href="<?php echo $url; ?>" title=""><img src="/files/<?php echo $picture ?>" alt="" /></a>
                                <?php } ?>
                                <p>
                                    <?php echo $preview_text ?>
                                </p>
                                <div class="clr"></div>
                            </div>
                        </li>

                        <?php } ?>

                    </ul>

                    <div class="paginator">
                   
                        <?php
					if($current_page>1&&$sotrang>1){
						$previous=$current_page-1;
						
						$url_previous='/'.$new_nameCat.'-'.$cid.'-page'.$previous;

				?>		
						<a href="<?php echo $url_previous;?>"><<==Previous</a>
				<?php } ?>

				
				<?php

					for($i=1;$i<=$sotrang;$i++){

					if($current_page==$i){
						$active="class='active'";
					}else{
						$active=null;
					}
					$url2='/'.$new_nameCat.'-'.$cid.'-page'.$i;
				?>
				|<a href="<?php echo $url2; ?>" <?php echo $active; ?>>Trang <?php echo $i;?></a>
				<?php } ?>


				<?php
					if($current_page<$sotrang&&$sotrang>1){
						$next=$current_page+1;
						$url_next='/'.$new_nameCat.'-'.$cid.'-page'.$next;

				?>		
						<a href="<?php echo $url_next;?>">Next==>></a>
				<?php } ?>


                    </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/templates/public/inc/footer.php';
?>