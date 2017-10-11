<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; 
?>
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';

?>
<?php
	$id_user=$_GET['id'];
	$query="DELETE FROM users WHERE id_user={$id_user}";
	$result=$mysqli->query($query);
	if($result){
		header('location:indexUser.php?msg=Xóa thành công');
		exit();
	}else{
		echo "Có lỗi khi xóa ";
		die();
	}

?>

<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; 
?>