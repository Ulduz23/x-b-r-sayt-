<pre>
<?php

$data = file_get_contents('https://report.az/son-xeberler/');
//echo $data;

preg_match('/<section class="news-feed-page pt-20">(.*)<\/section>/siU', $data,$list);
unset($list[0]);

//print_r($list);

preg_match_all('/<a class="title" href="(.*)" target="_blank">/siU',$list[1],$links);
unset($links[0]);

//print_r($list);

for($i=0; $i<count($links[1]); $i++)
{
    $link = 'https://report.az/son-xeberler/'.$links[1][$i];    
    echo 'LINK: '.$link.'<br>';
    
     $tamdata = file_get_contents($link);
    preg_match('/<meta property="og:title" content="(.*)">.*<meta property="og:image" content="(.*)">.*<a class="news-category".*>(.*)<\/a>.*<div .*>.*<p>(.*)<\/div>.*<time itemprop="datePublished" datetime="(.*)"><\/time>/siU', $tamdata,$info);
    
    unset($info[0]);
    
    $title = $info[1];
    echo'TITLE: '.$title.'<br>';
    
    $image = $info[2];
    echo'IMAGE: '.$image.'<br>';
    
    $cat = $info[3];
    echo'CAT: '.$cat.'<br>';
        
    $text = $info[4];
    echo'TEXT: '.$text.'<br><br>';
    
    $tarix = $info[5];
    echo'TARIX: '.$tarix.'<br>';
}

?>
</pre>