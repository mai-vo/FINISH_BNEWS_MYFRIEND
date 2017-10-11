<?php
    // khởi tạo đối tượng mysql_affected_rows
   $hostname='localhost';
   $username='root';
   $password='';
   $database='cnews';
 
   $mysqli=new mysqli($hostname,$username,$password,$database);
   
   //xét font chữ tiếng Việt
   $mysqli-> set_charset('utf8');
   //kiểm tra kết nối 
   if(mysqli_connect_errno()){
	   echo "không thể kết nối cơ sở dữ liệu";
   }

?>