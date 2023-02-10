<?php
include"header.php";

$tarix=date('Y-m-d H:i:s');

if(isset($_POST['d']))
{
    $ad=mysqli_real_escape_string($con,htmlspecialchars(strip_tags(trim($_POST['ad']))));
    $email=mysqli_real_escape_string($con,htmlspecialchars(strip_tags(trim($_POST['email']))));
    $movzu=mysqli_real_escape_string($con,htmlspecialchars(strip_tags(trim($_POST['movzu']))));
    $mesaj=mysqli_real_escape_string($con,htmlspecialchars(strip_tags(trim($_POST['mesaj']))));

    if(!empty($ad) && !empty($email) && !empty($movzu) && !empty($mesaj))
    {
        $gir = mysqli_query($con,"INSERT INTO contact(ad,email,movzu,mesaj,tarix) VALUES('".$ad."','".$email."','".$movzu."','".$mesaj."','".$tarix."')");
        
        if($gir==true)
        {echo'<div class="alert alert-success" role="alert">Melumatlar ugurla gonderildi.</div>';}
        else
        {echo'<div class="alert alert-danger" role="alert">Melumatlar ugurla gonderilmedi.</div>';}
    }
    else
    {echo'<div class="alert alert-warning" role="alert">Melumatlar bos gondermeyin.</div>';}
}

?>
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Ana sehife</a></li>
                    <li class="breadcrumb-item active">Elaqe</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="ad" class="form-control" placeholder="Adiniz" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Emailiniz" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="movzu" class="form-control" placeholder="Movzu" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="mesaj" placeholder="Mesajiniz"></textarea>
                                </div>
                                <div><button class="btn" type="submit" name="d">Gonder</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h3>Bizimlə əlaqə</h3>
                            <p>Bu sayt Ulduz Quliyeva tərəfindən bir çox dillər istifadə olunaraq yaradılmışdır.Hər hansı sualınız,təklifiniz və ya iradınız varsa bizimlə əlaqə saxlaya bilərsiniz</p>
                            <h4><i class="fa fa-map-marker"></i>Sumqayıt</h4>
                            <h4><i class="fa fa-envelope"></i>ulduz23042002@gmail.com</h4>
                            <h4><i class="fa fa-phone"></i>+994-70-878-8779</h4>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
<?php 
include"footer.php";
 ?>

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
