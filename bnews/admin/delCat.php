<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; 
?>
<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';

?>
<?php
	$id_cat=$_GET['id'];
	$queryDel="DELETE FROM news WHERE id_cat={$id_cat}";
	
	$resultDel=$mysqli->query($queryDel);
	$query="DELETE FROM category WHERE id_cat={$id_cat}";
	$result=$mysqli->query($query);
	if($result){
		header('location:indexCat.php?msg=Xóa thành công');
		exit();
	}else{
		echo "Có lỗi khi xóa ";
		die();
	}

?>

<?php

 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; 
?>