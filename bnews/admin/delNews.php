<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; 
?>
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';

?>
	<?php
		$id=$_GET['id'];
	
		$query="SELECT picture FROM news WHERE id_news={$id}";
		$result=$mysqli->query($query);
		$arNew=mysqli_fetch_assoc($result);
		$picture=$arNew['picture'];
		unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$picture);

		$sql="DELETE FROM news WHERE id_news={$id}";
		$ketqua=$mysqli->query($sql);
		if($ketqua){
			header('location:indexNews.php?msg=Xóa thành công!');
		}else{
			echo "Có lỗi khi xóa ";
		}

	?>
<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; 
?>