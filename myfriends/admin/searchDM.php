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
                   <?php
            $queryTSD="SELECT count(fid) AS tongsodong FROM friends";
            $resultTSD=$mysqli->query($queryTSD);
            $arTSD=mysqli_fetch_assoc($resultTSD);
            $tongsodong=$arTSD['tongsodong'];


            $row_count=ROW_COUNTDS;

            $sotrang=ceil($tongsodong/$row_count);


            if(isset($_GET['page'])){
                $current_page=$_GET['page'];
            }else{
                $current_page=1;
            }
            $offset=($current_page-1)*$row_count;
            echo $offset;

            ?>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh mục bạn bè</h4>
                                
                                <?php
                                    if(isset($_GET['msg'])){
                                        echo '<p class="category success">'.$_GET['msg']. '</p>';
                                    }
                                ?>
                                
                                <?php
                                    if(isset($_POST['search'])){
                                        $fl_id=$_POST['friend_list'];
                                        header("location:searchDM.php?fl_id=$fl_id");

                                    }
                                ?>
                                <?php
                                    if(isset($_POST['reset'])){
                                       header("location:indexDM.php");

                                    }
                                ?>
                                <form action="" method="post">
                                	<div class="row">
                                       
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="friend_list" class="form-control border-input">
                                                	<option value="0">-- Chọn danh mục --</option>
                                                    <?php
                                                        $query="SELECT * FROM friend_list";
                                                        $result=$mysqli->query($query);
                                                        while($arDM=mysqli_fetch_assoc($result)){
                                                            $fl_id=$arDM['fl_id'];
                                                            $fl_name=$arDM['fl_name'];
                                                    ?>
                                                	<option value="<?php echo $fl_id ?>"><?php echo $fl_name ?></option>
                                                	<?php } ?>
                                                </select>
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
                                
                                <a href="addDM.php" class="addtop"><img src="/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Danh mục</th>
                                    	
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $fl_id=$_GET['fl_id'];
                                        $query="SELECT * FROM friend_list WHERE fl_id=$fl_id";

                                        $result=$mysqli->query($query);
                                        while($arDM=mysqli_fetch_assoc($result)){
                                            $fl_id=$arDM['fl_id'];
                                            $fl_name=$arDM['fl_name'];
                                            $urlDel="delDM.php?id=$fl_id";
                                            $urlEdit="editDM.php?id=$fl_id";
                                    ?>
                                        <tr>
                                        	<td><?php echo $fl_id ?></td>
                                        	<td><a href="edit.html"><?php echo $fl_name ?></a></td>
                                        	
                                        	<td>
                                        		<a href="<?php echo $urlEdit ?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a href="<?php echo  $urlDel ?>"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
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