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
            //đếm dòng dữ liệu trong cơ sở dữ liệu
            $queryTSD="SELECT count(fid) AS tongsodong FROM friends";
            
            $resultTSD=$mysqli->query($queryTSD);
            $arTSD=mysqli_fetch_assoc($resultTSD);
            $tongsodong=$arTSD['tongsodong'];
           

            $row_count=ROW_COUNTDS;
            //tổng số trang
            $sotrang=ceil($tongsodong/$row_count);

            //lấy trang hiện tại

            if(isset($_GET['page'])){
                $current_page=$_GET['page'];
            }else{
                $current_page=1;
            }
            $offset=($current_page-1)*$row_count;

            ?>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách bạn bè</h4>
                                <?php 
                                    if(isset($_GET['msg'])){    
                                ?>
                                <p class="category success"><?php echo $_GET['msg'] ?></p>
                                <?php } ?>

                                <?php
                                    if(isset($_POST['search'])){
                                        $id=$_POST['id'];
                                        $fullname=$_POST['fullname'];
                                        $friend_list=$_POST['friend_list'];
                                        header("location:searchDSBB.php?id=$id&fullname=$fullname&friend_list=$friend_list");

                                    }
                                ?>

                                <form action="" method="post">
                                	<div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="text" name="id" class="form-control border-input" value=""  placeholder="ID">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Họ tên" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="friend_list" class="form-control border-input">
                                                    <option value="0">-- Chọn danh mục --</option>
                                                    <?php
                                                        $query="SELECT * FROM friend_list";
                                                        $result=$mysqli->query($query);
                                                        while($arDM=mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <option value="<?php echo $arDM['fl_id']; ?>"><?php echo $arDM['fl_name']; ?></option>
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
                                
                                <a href="addDS.php" class="addtop"><img src="/templates/admin/assets/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Họ tên</th>
                                    	<th>Hình ảnh</th>
                                    	<th>Ngày tạo</th>
                                    	<th>Thuộc danh sách</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query="SELECT friends.*,friend_list.fl_name 
                                                    FROM friends 
                                                    JOIN friend_list
                                                    ON friends.friend_list_id=friend_list.fl_id
                                                    ORDER BY fid DESC LIMIT {$offset},{$row_count}";
                                            $result=$mysqli->query($query);
                                            while($arFriends=mysqli_fetch_assoc($result)){   
                                                    $fid=$arFriends['fid'];
                                                    $fname=$arFriends['fname'];
                                                    $picture=$arFriends['picture'];
                                                    $date_create=$arFriends['date_create'];
                                                    $fl_name=$arFriends['fl_name'];
                                                    $urlDel="delDS.php?id=$fid";
                                                    $urlEdit="editDS.php?id=$fid";
                                                    
                                        ?>
                                        <tr>
                                        	<td><?php echo $fid ?></td>
                                        	<td><a href="edit.html"><?php echo $fname ?></a></td>
                                        	<td>
                                            <?php 
                                                if($picture==''){
                                                    echo "Không có hình ảnh";
                                                }else{
                                            ?>
                                                    <img src="/files/<?php echo $picture ?>" alt="" width="100px" />
                                                <?php } ?>
                                            </td>
                                        	<td><?php echo $date_create ?></td>
                                        	<td><?php echo $fl_name ?></td>
                                        	<td>
                                        		<a href="<?php echo $urlEdit; ?>"><img src="/templates/admin/assets/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a href="<?php echo $urlDel; ?>"onclick="return confirm('Bạn có chắn chắn xóa không ?');"><img src="/templates/admin/assets/img/del.gif" alt="" /> Xóa</a>
                                        	</td>
                                        </tr>
                                       <?php } ?>
                                        
                                    </tbody>
 
                                </table>

								<div class="text-center">
								    <ul class="pagination">
                                    <?php
                                        if($current_page>1&&$sotrang>1){
                                            $previous=$current_page-1;
                                     ?>       
                                            <li><a href="index.php?page=<?php echo $previous; ?>" title="">Previous</a></li>
                                      <?php  } ?>

                                    
                                    <?php
                                        for ($i=1; $i <=$sotrang ; $i++) { 
                                            if($i==$current_page){
                                                $active='class="active"';
                                            }else{
                                                $active="";
                                            }
                                        
                                    ?>
								        <li><a href="index.php?page=<?php echo $i; ?>" title="" <?php echo $active; ?>><?php echo $i; ?></a></li> 
								       <?php } ?> 



                                    <?php
                                        if($current_page<$sotrang&&$sotrang>1){
                                            $next=$current_page+1;
                                     ?>       
                                            <li><a href="index.php?page=<?php echo $next; ?>" title="">Next</a></li>
                                      <?php  } ?>

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