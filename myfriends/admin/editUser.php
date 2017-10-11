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
                                <h4 class="title">Sửa User</h4>
                            </div>
                            <div class="content">
                            <?php
                                $id=$_GET['id'];
                                $query="SELECT * FROM user WHERE id={$id}";
                                $result=$mysqli->query($query);
                                $arUser=mysqli_fetch_assoc($result);
                                

                                if(isset($_POST['sua'])){
                                    $username=$_POST['username'];
                                    $password=$_POST['password'];
                                    $fullname=$_POST['fullname'];
                                    $active=$_POST['active'];
                                    if($password==''){
                                        $query1="UPDATE user SET username='{$username}',fullname='{$fullname}',active='{$active}' WHERE id={$id}";
                                       $result1=$mysqli->query($query1);
                                       if($result1){
                                      header('location:indexUser.php?msg=Sửa thành công !');
                                       exit();
                                        }else{
                                            echo "Lỗi khi sửa ";
                                        }
                                    

                                    

                                }else{
                                    $password_mahoa=md5($password);
                                    $query1="UPDATE user SET username='{$username}',password='{$password_mahoa}',fullname='{$fullname}',active='{$active}' WHERE id={$id}";
                                       $result1=$mysqli->query($query1);
                                       if($result1){
                                      header('location:indexUser.php?msg=Sửa thành công !');
                                       exit();
                                       }else{
                                            echo "Lỗi khi sửa có password";
                                        }


                                }
                            }
                            ?>
                                <form action="" method="post" id="form">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>username</label>
                                                <?php 
                                                    if($arUser['username']=="admin"){
                                                  ?>      
                                                        <input type="text" readonly  name="username" class="form-control border-input" placeholder="Username" value="<?php echo $arUser['username'] ?>">

                                                    <?php }else{?>
                                            
                                                         <input type="text"   name="username" class="form-control border-input" placeholder="Username" value="<?php echo $arUser['username'] ?>">
                                                         <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label>password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder="Password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>fullname</label>
                                                <input type="text" name="fullname" class="form-control border-input" placeholder="Fullname" value="<?php echo $arUser['fullname'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>active</label>
                                                <input type="text" name="active" class="form-control border-input" placeholder="Active 0 hoặc 1" value="<?php echo $arUser['active'] ?>">
                                            </div>
                                        </div>
                                       
                                    
                                    <div class="text-center" >
                                        <input type="submit" name="sua" class="btn btn-info btn-fill btn-wd" value="Sửa" />
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
     