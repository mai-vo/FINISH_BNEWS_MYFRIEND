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

                                <h4 class="title">Thêm thông tin</h4>
                            </div>
                            <div class="content">
                            <?php 
                                if(isset($_POST['them'])){
                                    $hoten=$_POST['hoten'];
                                    $date=$_POST['date'];
                          
                                    $preview=$_POST['mota'];
                                    $detail=$_POST['chitiet'];
                                    $read=$_POST['read'];
                                    $friend_list=$_POST['friend_list'];
                                    $picture=$_FILES['picture']['name'];
                                    
                                    
                                    if($picture==""){
                                            $query_nopic="INSERT INTO friends(fname,preview,detail,date_create,friend_list_id,fread)
                                                            VALUES ('{$hoten}','{$preview}','{$detail}','{$date}','  {$friend_list}','{$read}')";
                                           echo $query_nopic;
                                           $result_nopic=$mysqli->query($query_nopic);
                                            if($result_nopic){
                                                header('location:index.php?msg=Thêm thành công!');   
                                            }else{
                                                echo "Lỗi khi thêm không ảnh";
                                                die();
                                            }
                                    }else{
                                    
                                        $tmp=explode('.', $picture);
                                        $duoifile=end($tmp);
                                        $newPic='VNE-'.time().'.'.$duoifile;
                                        echo $newPic;
                                        $tmp_name=$_FILES['picture']['tmp_name'];
                                        echo $tmp_name;
                                        $pathUpload=$_SERVER['DOCUMENT_ROOT'].'/files/'.$newPic;
                                        echo $pathUpload;
                                        $result_Pic=move_uploaded_file($tmp_name, $pathUpload);
                                        if($result_Pic){
                                            $query_Pic="INSERT INTO friends(fname,preview,detail,date_create,friend_list_id,fread,picture)
                                                            VALUES ('{$hoten}','{$preview}','{$detail}','{$date}','{$friend_list}','{$read}','{$newPic}')";
                                            $result_Pic=$mysqli->query($query_Pic);
                                            if($result_Pic){
                                                header('location:index.php?msg=Thêm thành công!');
                                                exit();
                                            }else{
                                                echo "Có lỗi khi thêm có ảnh";
                                            }
                                        }

                                     }
                                }
                            ?>
                                <form action="" method="post" enctype="multipart/form-data" id="form">
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" name="hoten" class="form-control border-input" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date">Ngày tạo</label>
                                                <input type="text" name="date" value="" class="form-control border-input" placeholder="Ngày tạo">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="read">Lượtđọc</label>
                                                <input type="text" name="read" value="" class="form-control border-input" placeholder="Lượt đọc">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Danh mục bạn bè</label>
                                                <select name="friend_list" class="form-control border-input">
                                                <?php
                                                    $query="SELECT * FROM friend_list";
                                                    $result=$mysqli->query($query);
                                                    while($arDM=mysqli_fetch_assoc($result)){ 
                                                        $id=$arDM['fl_id'];
                                                        $fl_name=$arDM['fl_name'];

                                                ?>
                                                	<option value="<?php echo $id; ?>"><?php echo $fl_name; ?></option>
                                                <?php } ?>	
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea rows="4" name="mota" class="form-control border-input" placeholder="Mô tả tóm tắt về bạn của bạn"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Chi tiết</label>
                                                </br>
                                                <textarea rows="6" name="chitiet" class=" ckeditor form-control border-input" placeholder="Mô tả chi tiết về bạn của bạn"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" name="them" class="btn btn-info btn-fill btn-wd" value="Thêm" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#form").validate({
                                            ignore: [],
                                            rules: {
                                                "hoten": {
                                                    required: true,
                                                    
                                                },
                                                "date": {
                                                    required: true,
                                                    
                                                },
                                                "read": {
                                                    required: true,
                                                    
                                                },
                                              
                                                "mota": {
                                                    required: true,
                                                    
                                                },
                                                "chitiet": {
                                                    required: function(){
                                                     CKEDITOR.instances.chitiet.updateElement();
                                                         },
                                                     minlength:1,
                                                    
                                                },

                                                
                                            },
                                            messages: {
                                                "hoten": {
                                                    required: "<strong style='color:red'>Vui lòng nhập danh mục</strong>",
                                                    
                                                },
                                                "date": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vào ngày đăng!</strong>",
                                                    
                                                },
                                                "read": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vào lượt đọc!</strong>",
                                                    
                                                },
                                               
                                                "mota": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vào mô tả!</strong>",
                                                    
                                                },
                                                "chitiet": {
                                                    required: "<strong style='color:red'>Vui lòng nhập vào chi tiết!</strong>",
                                                    
                                                },
                                            }
                                        });
                                    });
                                </script>

                </div>
            </div>
        </div>

 <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/req/footer.php';
?>
     