<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/header.php';
     if(isset($_SESSION['arUser'])){
    header('location:index.php');
 }
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
                <div class="collapse navbar-collapse">
                    <?php
                    require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/noi_logout.php';
                    ?>

                </div>
            </div>  
            
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Đăng nhập</h4>
                            </div>
                            <div class="content">
                            <?php
                                if(isset($_POST['submit'])){
                                    $username=$_POST['username'];
                                    $password=$_POST['password'];
                                    $password=md5($password);
                                    $query="SELECT * FROM user WHERE username='{$username}' AND password='$password' LIMIT 1";
                                    $result=$mysqli->query($query);
                                    $arUser=mysqli_fetch_assoc($result);
                                    if($arUser==NULL){
                                        echo '<strong style="color:red">Sai username và password</strong>';
                                    }else{
                                        $_SESSION['arUser']=$arUser;
                                        echo "<pre>";
                                            print_r($arUser);
                                        echo "</pre>";
                                        header('location:index.php');
                                    }

                                    
                                }
                            ?>
                                <form action="" method="POST" id="form">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Tên đăng nhập" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="Mật khẩu" value="">
                                            </div>
                                        </div>
                                       
                                    
                                    <div class="text-center" >
                                        <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd" value="Đăng nhập" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                             <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#form").validate({

                                        rules: {
                                            "username": {
                                                required: true,
                                                
                                            },
                                            "password": {
                                                required: true,
                                                minlength:6,
                                                maxlength:32,
                                            },


                                            
                                        },
                                        messages: {
                                            "username": {
                                                required: "<strong style='color:red'>Vui lòng nhập vào tên đăng nhập!</strong>",
                                                
                                            },
                                            "password": {
                                                required: "<strong style='color:red'>Vui lòng nhập vào mật khẩu!</strong>",
                                                minlength: "<strong style='color:red'>Password phải có ít nhất 6 ký tự!</strong>",
                                                maxlength: "<strong style='color:red'>Password có nhiều nhất 32 ký tự!!</strong>",
                                            }
                                            
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
     