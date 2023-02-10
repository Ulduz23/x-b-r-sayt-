<?php 
include"header.php";
 ?>

<!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                        <?php
                        
                        $sec = mysqli_query($con,"SELECT * FROM xeber ORDER BY id DESC LIMIT 3");
                        while($info = mysqli_fetch_array($sec))
                        {
                            echo'
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="'.$info['image'].'">
                                    <div class="tn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';
                        }
                        ?>
                        </div>
                    </div>

                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <?php
                        
                            $sec = mysqli_query($con,"SELECT * FROM xeber ORDER BY id DESC LIMIT 3,4");
                            while($info = mysqli_fetch_array($sec))
                            {
                            echo'
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="'.$info['image'].'">
                                    <div class="tn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';
                }
                ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Siyaset</h2>
                        <div class="row cn-slider">
                            <?php
                        
                            $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat IN('Siyasət') ORDER BY id DESC LIMIT 5");
                            while($info = mysqli_fetch_array($sec))
                            {
                            echo'
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="'.$info['image'].'"/>
                                    <div class="cn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2>Dunya</h2>
                        <div class="row cn-slider">
                            <?php
                        
                            $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat IN('Dünya') ORDER BY id DESC LIMIT 5");
                            while($info = mysqli_fetch_array($sec))
                            {
                            echo'
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="'.$info['image'].'"/>
                                    <div class="cn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Cəmiyyət</h2>
                        <div class="row cn-slider">
                            <?php
                        
                            $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat IN('Cəmiyyət') ORDER BY id DESC LIMIT 5");
                            while($info = mysqli_fetch_array($sec))
                            {
                            echo'
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="'.$info['image'].'"/>
                                    <div class="cn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                           
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2>İqtisadiyyat</h2>
                        <div class="row cn-slider">
                            <?php
                        
                            $sec = mysqli_query($con,"SELECT * FROM xeber WHERE cat IN('İqtisadiyyat') ORDER BY id DESC LIMIT 5");
                            while($info = mysqli_fetch_array($sec))
                            {
                            echo'
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="'.$info['image'].'"/>
                                    <div class="cn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->

        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <?php
                        
                            $sec = mysqli_query($con,"SELECT * FROM xeber ORDER BY id DESC LIMIT 20,12");
                            while($info = mysqli_fetch_array($sec))
                            {
                            echo'
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="'.$info['image'].'"/>
                                    <div class="mn-title">
                                        <a href="single.php?id='.$info['id'].'">'.$info['title'].'</a>
                                    </div>
                                </div>
                            </div>';}
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
        <!-- Main News End-->
        <?php 
        include"footer.php";
         ?>
