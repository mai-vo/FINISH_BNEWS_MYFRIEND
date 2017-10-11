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
                            <?php
                                $id=$_GET['id'];
                                $query="SELECT * FROM friends WHERE fid={$id}";
                                $result=$mysqli->query($query);
                                $arFriends=mysqli_fetch_assoc($result);
                                

                            ?>

                                <h4 class="title">Sửa thông tin</h4>
                            </div>
                            <div class="content">
                            <?php 
                                if(isset($_POST['sua'])){
                                    $hoten=$_POST['hoten'];
                                    $preview=$_POST['mota'];
                                    $detail=$_POST['chitiet'];
                                    $date=$_POST['date'];
                                    $read=$_POST['read'];
                                    $friend_list=$_POST['friend_list'];
                                    $picture=$_FILES['picture']['name'];
                                
                                   
                                    
                                    if($picture==''){
                                        if(isset($_POST['delete_picture'])&&$arFriends!=''){
                                            unlink($_SERVER['DOCUMENT_ROOT'].'/files/'.$arFriends['picture']);
                                             $query_nopic="UPDATE friends 
                                                       SET fname='{$hoten}',
                                                           preview='{$preview}',
                                                           detail='{$detail}',
                                                           date_create='{$date}',
                                                           friend_list_id='{$friend_list}',
                                                           fread='{$read}',
                                                           picture=''
                                                           WHERE fid={$id}"; 
                                                       
                                                $result_nopic=$mysqli->query($query_nopic);
                                                 if($result_nopic){
                                                header('location:index.php?msg=Sửa thành công!');
                                                 exit();
                                                }else{
                                                 echo "Có lỗi khi sửa!";
                                                 }   

                                        }else{
                                                $query_nopic="UPDATE friends 
                                                       SET fname='{$hoten}',
                                                           preview='{$preview}',
                                                           detail='{$detail}',
                                                           date_create='{$date}',
                                                           friend_list_id='{$friend_list}',
                                                           fread='{$read}' 
                                                           WHERE fid={$id}"; 
                                                       
                                                 $result_nopic=$mysqli->query($query_nopic);
                                                 if($result_nopic){
                                                     header('location:index.php?msg=Sửa thành công!');
                                                 exit();
                                                }else{
                                                    echo "Có lỗi khi sửa!";
                                                }   

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
                                            $query_Pic="UPDATE friends 
                                                       SET fname='{$hoten}',
                                                           preview='{$preview}',
                                                           detail='{$detail}',
                                                           date_create='{$date}',
                                                           friend_list_id='{$friend_list}',
                                                           fread='{$read}',
                                                           picture='{$newPic}'
                                                           WHERE fid={$id}"; 
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
                                                <input type="text" name="hoten" class="form-control border-input" placeholder="" value="<?php echo $arFriends['fname'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date">Ngày tạo</label>
                                                <input type="text" name="date" value="<?php echo $arFriends['date_create'] ?>" class="form-control border-input" placeholder="Ngày tạo">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="read">Lượtđọc</label>
                                                <input type="text" name="read" value="<?php echo $arFriends['fread']; ?>" class="form-control border-input" placeholder="Lượt đọc">
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
                                                        $selected="";
                                                        if($id==$arFriends['friend_list_id']){
                                                            $selected='selected="selected"';

                                                        }
                                                ?>
                                                	<option value="<?php echo $id; ?>" <?php echo $selected ?>><?php echo $fl_name; ?></option>
                                                
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
                                            <div class="form-group">
                                                <label>Ảnh cũ</label>
                                                <?php
                                                    if($arFriends['picture']!=""){
                                                ?>
                                                <img src="/files/<?php echo $arFriends['picture']; ?>" width="120px" alt="" /> 
                                                <?php }else{ 

                                                    echo "<strong style='color:red'>Không có ảnh cũ</strong>";
                                                    }?>


                                                ||Xóa <input type="checkbox" name="delete_picture" value="1" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mô tả</label><textarea rows="4" name="mota" class="form-control border-input" placeholder=""><?php echo $arFriends['preview'];?> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Chi tiết</label>
                                                </br>
                                                <textarea rows="6" name="chitiet" class=" ckeditor form-control border-input" placeholder=""><?php echo $arFriends['detail']; ?></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" name="sua" class="btn btn-info btn-fill btn-wd" value="Sửa" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
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
     