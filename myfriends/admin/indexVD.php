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
                                <h4 class="title">Danh sách videos </h4>
                                
                                <?php
                                    if(isset($_GET['msg'])){
                                        echo '<p class="category success">'.$_GET['msg']. '</p>';
                                    }
                                ?>
                                
                                
                                
                                
                                <a href="addVD.php" class="addtop"><img src="/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>id</th>
                                    	<th>vname</th>
                                    	<th>vcode</th>
                                        <th>date_create</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query="SELECT * FROM videos";
                                        $result=$mysqli->query($query);
                                        while($arVD=mysqli_fetch_assoc($result)){
                                            $id=$arVD['id'];
                                            $vname=$arVD['vname'];
                                            $vcode=$arVD['vcode'];
                                            $date_create=$arVD['date_create'];
                                            $urlDel="delVD.php?id=$id";
                                            $urlEdit="editVD.php?id=$id";
                                    ?>
                                        <tr>
                                        	<td><?php echo $id ?></td>
                                        	<td><a href="edit.html"><?php echo $vname ?></a></td>
                                        	<td><?php echo $vcode ?></td>
                                            <td><?php echo $date_create ?></td>
                                        	<td>
                                        		<a href="<?php echo $urlEdit ?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a href="<?php echo  $urlDel ?>" onclick="return confirm('Bạn có chắn chắn xóa không ?');"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                        	</td>
                                        </tr>
                                     <?php } ?>   
                                        
                                    </tbody>
 
                                </table>

								<div class="text-center">
								    <ul class="pagination">
								        <li><a href="?p=0" title="">1</a></li> 
								         
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