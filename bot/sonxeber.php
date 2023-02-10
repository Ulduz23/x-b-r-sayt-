<pre>
<?php

$data=file_get_contents('https://sonxeber.az/');
//echo $data;

preg_match('/<div class="blk_as">(.*)<div class="blk_rek">/siU',$data,$list);
unset($list[0]);

//print_r($list);

preg_match_all('/<a href="(.*)" .*>/siU',$list[1],$links);
unset($links[0]);

//print_r($links);

for($i=0; $i<count($links[1]); $i++)
{
    $link='https://sonxeber.az/'.$links[1][$i];
    echo'LINK: '.$link.'<br>';
    
    $tamdata=file_get_contents($link);
    preg_match('/<meta property="og:title" content="(.*)" \/>.*<meta property="og:image" content="(.*)" \/>.*<article>.*<img .*>(.*)<br\/>.*<span class="right"><a .*>(.*)<\/a>/siU', $tamdata,$info);
    
    unset($info[0]);
    
    $title = $info[1];
    echo'TITLE: '.$title.'<br>';
    
    $image = $info[2];
    echo'IMAGE: '.$image.'<br>';
        
    $text = $info[3];
    echo'TEXT: '.$text.'<br><br>';
    
    $cat = $info[4];
    echo'CAT: '.$cat.'<br><br>';
    


}


?>
</pre>