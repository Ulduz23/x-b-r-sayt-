<?php 
include"header.php";
 ?>

<!-- Main News Start-->
<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="main-news">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                            <?php
    
                    $sehife=12;
                    $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat = '".$_GET['cat']."' ");
                    $toplam = mysqli_num_rows($sec);
                    $toplam_sehife=ceil($toplam/$sehife);
                    
                    $page = (int)$_GET['page'];
                    
                    if($page<1 or empty($page)){$page=1;}
                    if($page>$toplam_sehife){$page=$toplam_sehife;}
                    
                    $limit=abs(($page-1) * $sehife);
                       
                    $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat = '".$_GET['cat']."' ORDER BY id DESC LIMIT ".$limit.",".$sehife);
                    while($info = mysqli_fetch_array($sec))
                            {
                            echo'
                                <div class="col-md-4">
                                    <div class="mn-img">
                                        <img src="'.$info['image'].'" />
                                        <div class="mn-title">
                                            <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                        </div>
                                    </div>
                                </div>';}


                                for($i = 1; $i <= $toplam_sehife; $i++){
                                    if($page==$i){
                                    echo $i.'-';
                                   }else {
                                    echo'<a href="?page=' . $i . '&cat='.$_GET['cat'].'" style="color:black">' . $i . '</a> - ';
                                    
                                   }
                                }
                                ?>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mn-list">
                                        <h2>Xeberler</h2>
                                        <ul>
                                    <?php
                        
                                    $sec = mysqli_query($con,"SELECT * FROM xeber ORDER BY id DESC LIMIT 32,10");
                                    while($info = mysqli_fetch_array($sec))
                                    {
                                    echo'
                                    <li><a href="single.php?id='.$info['id'].'">'.$info['title'].'</a></li>';}
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- Main News End-->
<?php 
include"footer.php";
?>
