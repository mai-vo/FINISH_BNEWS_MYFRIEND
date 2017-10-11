 <?php
      require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/header.php';
      require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';
 ?>

<?php 
		$id=$_GET['id'];
		$query="SELECT picture FROM friends WHERE fid={$id}";
		$result=$mysqli->query($query);
		$arFriends=mysqli_fetch_assoc($result);
		$picture=$arFriends['picture'];
		if($picture!=""){
			unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$picture);

		}
		$queryDel="DELETE FROM friends WHERE fid={$id}";
		$resultDel=$mysqli->query($queryDel);
		if($resultDel){
			header('location:index.php?msg=Xóa thành công!');
			exit();
		}else{
			echo "Có lỗi khi xóa !";
		}


?>
 <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/footer.php';
 ?>