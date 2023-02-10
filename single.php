
<?php 
include"header.php";


if(!empty($_GET['id']))
{
    $id = (int)$_GET['id'];
    $tsec = mysqli_query($con,"SELECT * FROM xeber WHERE id='".$id."'");
    
    if(mysqli_num_rows($tsec)>0)
    {
        $tinfo = mysqli_fetch_array($tsec);
        $oxusay=mysqli_query($con,"UPDATE xeber SET oxusay=oxusay+1 WHERE id='".$id."' ");
    }
    else
    {echo'<meta http-equiv="refresh" content="0; URL=index.php">'; exit;}
}

?>
<!-- Single News Start-->
<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sn-container">
                    <div class="sn-img">
                        <img src="<?=$tinfo['image']?>">
                    </div>
                    <div class="sn-content">
                        <b><?=$tinfo['title'] ?></b><br><br>
                        <p><?=$tinfo['text'] ?></p><br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg> <?=$tinfo['oxusay'] ?>
                    </div>
                </div>


                <div class="sn-related" id="cedvel">
                    <h2>En son xeberler</h2>
                    <div class="row sn-slider">
                        <?php
                        $sec = mysqli_query($con,"SELECT * FROM xeber ORDER BY id DESC LIMIT 7,10");
                        while($info = mysqli_fetch_array($sec))
                        {
                            echo'
                            <div class="col-md-4">
                                <div class="sn-img">
                                    <img src="'.$info['image'].'"/>
                                    <div class="sn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                        ?>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                        <h2 class="sw-title">Gundem xeberler</h2>
                            <div class="news-list">
                            <?php
                    
                            $sec = mysqli_query($con,"SELECT * FROM xeber ORDER BY id DESC LIMIT 50,5");
                            while($info = mysqli_fetch_array($sec))
                            {
                                echo'
                                    <div class="nl-item">
                                        <div class="nl-img">
                                            <img src="'.$info['image'].'"/>
                                        </div>
                                        <div class="nl-title">
                                            <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                        </div>
                                    </div>';}
                            ?>
                            </div>
                        </div>
                            
                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>
                            
                    </div>
                </div>
                    
                <div class="col-md-8">
                    <div class="contact-form">
                        
                        <?php 

                        
                        if(isset($_POST['d']) && $_SESSION['token'] == $_POST['token'])
                        {
                            $ad=mysqli_real_escape_string($con,strip_tags(trim($_POST['ad'])));
                            $soyad=mysqli_real_escape_string($con,strip_tags(trim($_POST['soyad'])));
                            $email=mysqli_real_escape_string($con,strip_tags(trim($_POST['email'])));
                            $mesaj=mysqli_real_escape_string($con,strip_tags(trim($_POST['mesaj'])));

                            if(!empty($ad) && !empty($soyad) && !empty($email) && !empty($mesaj))
                            {
                                $daxilet=mysqli_query($con,"INSERT INTO comments(mid,ad,soyad,email,mesaj)
                                    VALUES('".$id."','".$ad."','".$soyad."','".$email."','".$mesaj."')");

                            }

                        }

                        $csec=mysqli_query($con,"SELECT * FROM comments WHERE mid='".$id."' ORDER BY id DESC");
                        if(mysqli_num_rows($csec)>0)
                        {
                            while($cinfo=mysqli_fetch_array($csec))
                            {
                                echo'<div class="card card-black post" style="padding:30px;">
                                        <div class="post-heading">
                                            <div class="float-left meta">
                                                <div class="title h5">
                                                    <a href="#"><b>'.$cinfo['ad'].' '.$cinfo['soyad'].'</b></a>
                                                </div>
                                                <h6 class="text-muted time">'.$cinfo['tarix'].'</h6>
                                            </div>
                                        </div>
                                        <div class="post-description">
                                            <p>'.$cinfo['mesaj'].'</p>
                                        </div>
                                    </div><br>';
                            }
                        }
                        else
                        {echo'<h4>Bu meqaleye aid hec bir serh yoxdur. Ilk siz olun.</h4>';}

                        $token=md5(time());
                        $_SESSION['token'] = $token;


                         ?>


                    <h2 class="sw-title">Comment</h2>
                        <form method="post" action="#cedvel">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="ad" class="form-control" placeholder="Adiniz"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="soyad" class="form-control" placeholder="Soyadınız"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Emailiniz"/>
                            </div>
                            
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="mesaj" placeholder="Mesajiniz"></textarea>
                            </div>
                            
                            <div><button class="btn" type="submit" name="d">Serh verin</button></div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Single News End-->        
        
<?php 
include"footer.php";
 ?>