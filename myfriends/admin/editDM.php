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
                                <h4 class="title">Sửa danh mục</h4>
                            </div>
                            <div class="content">
                            <?php
                                $id=$_GET['id'];
                                $query="SELECT * FROM friend_list WHERE fl_id={$id}";
                                $result=$mysqli->query($query);
                                $arDM=mysqli_fetch_assoc($result);


                                if(isset($_POST['sua'])){
                                    $tendanhmuc=$_POST['tendanhmuc'];
                                    $query1="UPDATE friend_list SET fl_name='{$tendanhmuc}' WHERE fl_id={$id}";
                                    $result1=$mysqli->query($query1);
                                    header('location:indexDM.php?msg=Sửa thành công !');
                                    exit();

                                }
                            ?>
                                <form action="" method="post" id="form">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <input type="text" name="tendanhmuc" class="form-control border-input" placeholder="Tên danh mục" value="<?php echo $arDM['fl_name'] ?>">
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
                                        rules: {
                                            "tendanhmuc": {
                                                required: true,
                                                
                                            },

                                            
                                        },
                                        messages: {
                                            "tendanhmuc": {
                                                required: "<strong style='color:red'>Vui lòng nhập danh mục</strong>",
                                                
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
     