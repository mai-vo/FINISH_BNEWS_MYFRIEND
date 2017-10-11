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
                                <h4 class="title">Sửa video</h4>
                            </div>
                            <div class="content">
                            <?php
                                $id=$_GET['id'];
                                $query="SELECT * FROM videos WHERE id={$id}";
                                $result=$mysqli->query($query);
                                $arVD=mysqli_fetch_assoc($result);


                                if(isset($_POST['sua'])){
                                    $vname=$_POST['vname'];
                                    $vcode=$_POST['vcode'];
                                    $date_create=$_POST['date_create'];

                                    $query1="UPDATE videos SET vname='{$vname}',vcode='{$vcode}',date_create='{$date_create}' WHERE id={$id}";
                                    $result1=$mysqli->query($query1);
                                    header('location:indexVD.php?msg=Sửa thành công !');
                                    exit();

                                }
                            ?>
                                <form action="" method="post" id="form">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>vname</label>
                                                <input type="text" name="vname" class="form-control border-input" placeholder="vname" value="<?php echo $arVD['vname'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>vcode</label>
                                                <input type="text" name="vcode" class="form-control border-input" placeholder="vcode" value="<?php echo $arVD['vcode'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>date_create</label>
                                                <input type="text" name="date_create" class="form-control border-input" placeholder="Ngày tạo" value="<?php echo $arVD['date_create'] ?>">
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
                                                "vname": {
                                                    required: true,
                                                    
                                                },
                                                "vcode": {
                                                    required: true,
                                                    
                                                },
                                                "date_create": {
                                                    required: true,
                                                    
                                                },
                                              
                                              
                                                
                                            },
                                            messages: {
                                                "vname": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vname!</strong>",
                                                    
                                                },
                                                "vcode": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vào vcode!</strong>",
                                                    
                                                },
                                                "date_create": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vào ngày tạo!</strong>",
                                                    
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
     