 <?php
      require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/header.php';
      require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';
 ?>

<?php
	$id=$_GET['id'];
	$queryDel="DELETE FROM friends WHERE friend_list_id={$id}";
	$resultDel=$mysqli->query($queryDel);

	$query="DELETE FROM friend_list WHERE fl_id={$id}";
	$result=$mysqli->query($query);
	header('location:indexDM.php?msg=Xóa thành công!');
	exit();


?>

 <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/footer.php';
 ?>