<div class="collapse navbar-collapse">
                    <ul class="nav hieu navbar-nav navbar-right mai1">
                       
                        <ul class="user-pro mai2">
                        <li class="mailionel">Chào,
                        <?php
                            if(isset($_SESSION['arUser'])){
                                echo "<strong style='color:blue'>".$_SESSION['arUser']['fullname']."</strong>";

                            }
                        ?>
                         <a href="profile.php">
                        <li class="mailionel"><a href="logout.php">Đăng xuất</a></li>
                            
                        </ul>   
                    </ul>

</div>