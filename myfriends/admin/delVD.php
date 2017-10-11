 <?php
      require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/header.php';
      require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';
 ?>

<?php
	$id=$_GET['id'];

	$query="DELETE FROM videos WHERE id={$id}";
	$result=$mysqli->query($query);
	header('location:indexVD.php?msg=Xóa thành công!');
	exit();


?>

 <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/footer.php';
 ?>