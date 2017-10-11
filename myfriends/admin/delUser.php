 <?php
      require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/header.php';
      require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';
 ?>

<?php
	$id=$_GET['id'];

	$query="DELETE FROM user WHERE id={$id}";
	$result=$mysqli->query($query);
	header('location:indexUser.php?msg=Xóa thành công!');
	exit();


?>

 <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/footer.php';
 ?>