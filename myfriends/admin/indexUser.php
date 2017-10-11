<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/header.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions/checkUser.php';
?>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">
    	   <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/left_bar.php';
           ?>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
           <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="/admin">Trang quản lý</a>
                </div>
              <?php
                    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/noi_logout.php';
                ?>
            </div>  
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách Users </h4>
                                
                                <?php
                                    if(isset($_GET['msg'])){
                                        echo '<p class="category success">'.$_GET['msg']. '</p>';
                                    }
                                ?>
                                
                                <?php
                                    if(isset($_POST['search'])){
                                        $fullname=$_POST['fullname'];
                                        echo $fullname;
                                        header("location:searchUsers.php?fullname={$fullname}");
                                         }
                                ?>
                                <form action="" method="post">
                                	<div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Fullname" value="">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-4">
                                        	<div class="form-group">
		                                        <input type="submit" name="search" value="Tìm kiếm" class="is" />
		                                        <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
	                                        </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="addUser.php" class="addtop"><img src="/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>id</th>
                                    	<th>username</th>
                                    	<th>password</th>
                                        <th>fullname</th>
                                        <th>active</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query="SELECT * FROM user";
                                        $result=$mysqli->query($query);
                                        while($arUsers=mysqli_fetch_assoc($result)){
                                            $id=$arUsers['id'];
                                            
                                            $username=$arUsers['username'];
                                         
                                            $password=$arUsers['password'];
                                            $fullname=$arUsers['fullname'];
                                            $active=$arUsers['active'];
                                            $urlDel="delUser.php?id=$id";
                                            $urlEdit="editUser.php?id=$id";
                                          
                                    ?>
                                        

                                            <tr>
                                            <td><?php echo $id ?></td>
                                            <td><a href="edit.html"><?php echo $username ?></a></td>
                                            <td></td>    
                                            <td><a href="edit.html"><?php echo $fullname ?></a></td>
                                            <td><?php echo $active ?></td>
                                            <td>
                                                <a href="<?php echo $urlEdit; ?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> 
                                                <?php 
                                                    if($username!="admin"){
                                                  ?>      
                                                        &nbsp;||&nbsp;<a href="<?php echo $urlDel ?>"onclick="return confirm('Bạn có chắn chắn xóa không ?');"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                                   <?php } ?>
                                                
                                               

                                            </td>
                                        </tr>

                                        
                                     <?php } ?>   
                                        
                                    </tbody>
 
                                </table>

								<div class="text-center">
								    <ul class="pagination">
								        <li><a href="?p=0" title="">1</a></li> 
								        <li><a href="?p=1" title="">2</a></li> 
								        <li><a href="?p=1" title="">3</a></li> 
								        <li><a href="?p=1" title="">4</a></li> 
								    </ul>
								</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/footer.php';
     ?> 