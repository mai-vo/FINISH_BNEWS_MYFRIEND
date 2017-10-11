<?php
//tạo đối tượng mysqli 
	$mysqli=new mysqli("localhost","root","","bnews");
	$mysqli->set_charset("utf8");
	if(mysqli_connect_errno()){
		echo 'Lỗi kết nối database'.mysqli_connect_error();

	}
?>