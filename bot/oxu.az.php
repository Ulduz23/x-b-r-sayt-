<pre>
<?php
$con=mysqli_connect('localhost','u387328485_xeber','Newsdata1','u387328485_xeberdata');

$menbe = 'oxu.az';
/*
DataBase -> newsdata
Table -> news
- id
- title (VARCHAR)
- text (TEXT)
- image (TEXT)
- cat (VARCHAR)
- menbe -> oxu.az
- link (VARCHAR 255)
- tarix
- created
*/

$data = file_get_contents('https://oxu.az/');
//echo $data;

preg_match('/<section class="news-list">(.*)<\/section>/siU', $data,$list);
unset($list[0]);

//print_r($list);

preg_match_all('/<a target="_blank" class="news-i-inner" href="(.*)">/siU',$list[1],$links);
unset($links[0]);

//print_r($list);

for($i=0; $i<count($links[1]); $i++)
{
    $link = 'https://oxu.az/'.$links[1][$i];    
    echo 'LINK: '.$link.'<br>';
    
    $tamdata = file_get_contents($link);
    preg_match('/<meta property="og:title" content="(.*)" \/>.*<meta property="og:image" content="(.*)" \/>.*<meta property="article:section" content="(.*)" \/><meta property="article:published_time" content="(.*)" \/>.*<p><\/p>.*<p>(.*)<\/article>/siU', $tamdata,$info);
    
    unset($info[0]);
    
    $title = mysqli_real_escape_string($con,strip_tags(trim($info[1])));
    echo'TITLE: '.$title.'<br>';
    
    $image = mysqli_real_escape_string($con,strip_tags(trim($info[2])));
    echo'IMAGE: '.$image.'<br>';
    
    $cat = mysqli_real_escape_string($con,strip_tags(trim($info[3])));
    echo'CAT: '.$cat.'<br>';
    
    $tarix = mysqli_real_escape_string($con,strip_tags(trim($info[4])));
    echo'TARIX: '.$tarix.'<br>';
    
    $text = mysqli_real_escape_string($con,strip_tags(trim($info[5]),'<a><img><iframe>'));
    echo'TEXT: '.$text.'<br><br>';
    
    
    if(!empty($title) && !empty($image) && !empty($text)){
        
        $yoxla = mysqli_query($con,"SELECT * FROM xeber WHERE link='".$link."'");
        
        if(mysqli_num_rows($yoxla)==0)
        {
            $daxil=mysqli_query($con,"INSERT INTO xeber(title,text,image,cat,menbe,link,tarix) VALUES('".$title."','".$text."','".$image."','".$cat."','".$menbe."','".$link."','".$tarix."')");
            
            if($daxil==true)
            {echo'Xeber ugurla elave edildi<br>';}
            else
            {echo'Xeber elave etmek mumkun olmadi<br>';}
        }
        else
        {echo'<b>Bu xeber artiq movcuddur<br></b>';}
    }
    
 
}




?>
</pre>