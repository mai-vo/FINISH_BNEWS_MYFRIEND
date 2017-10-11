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
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm User</h4>
                            </div>
                            <div class="content">
                            <?php
                                if(isset($_POST['them'])){
                                    $username=$_POST['username'];
                                    $password=$_POST['password'];
                                    $mahoapassword=md5($password);
                                    $fullname=$_POST['fullname'];
                                    $active=$_POST['active'];

                                    $query="INSERT INTO user(username,password,fullname,active) VALUES('{$username}','{$mahoapassword}','{$fullname}','{$active}')";
                                    $result=$mysqli->query($query);
                                    header('location:indexUser.php?msg=Thêm thành công !');
                                    exit();

                                }
                            ?>
                                <form action="" method="post" id="form">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="Password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>fullname</label>
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Fullname" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>active</label>
                                                <input type="text" name="active" class="form-control border-input" placeholder="Active 0 hoặc 1" value="">
                                            </div>
                                            
                                        </div>
                                       
                                    
                                    <div class="text-center" >
                                        <input type="submit" name="them" class="btn btn-info btn-fill btn-wd" value="Thêm" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#form").validate({
                                            ignore: [],
                                            rules: {
                                                "username": {
                                                    required: true,
                                                    
                                                },
                                                "password": {
                                                    required: true,
                                                    minlength:6,
                                                    maxlength:32,
                                                    
                                                },
                                                "fullname": {
                                                    required: true,
                                                    
                                                },
                                              
                                                "active": {
                                                    required: true,
                                                    
                                                },
                                                

                                                
                                            },
                                            messages: {
                                                "username": {
                                                    required: "<strong style='color:red'>Vui lòng nhập username!</strong>",
                                                    
                                                },
                                                "password": {
                                                    required: "<strong style='color:red'>Vui lòng nhập password!</strong>",
                                                    minlength: "<strong style='color:red'>Password phải có ít nhất 6 ký tự!</strong>",
                                                    maxlength: "<strong style='color:red'>Password có nhiều nhất 32 ký tự!!</strong>",
                                                },
                                                "fullname": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vào fullname!</strong>",
                                                    
                                                },
                                               
                                                "active": {
                                                    required: "<strong style='color:red'>Vui lòng nhập trạng thái active!</strong>",
                                                    
                                                },
                                               
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

 <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/footer.php';
?>
     