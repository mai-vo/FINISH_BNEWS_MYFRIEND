<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php';
?>
<?php
	if(isset($_SESSION['arUser'])){
		session_destroy();

	}
	header('location:login.php');

?>

<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php';
?>