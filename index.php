<?php
include_once('functions.php');
/*$res = curl("https://www.ladygaga.com");
 echo $res;*/

/*$str = "hello .world";
print_r(explodem(".",$str));*/

/*$str="system write buffers of PHP and whatever backend PHP is using";
print_r(rtrim($str));*/

/*for( $i = 0 ; $i < 10 ; $i++ )
{
    echo $i . '<br />';
    flush_buffers();
    sleep(1);
}*/
/*$str = "SomepartsoftheWordPresscode structure for PHP markup are inconsistent in their style";
echo create_slug($str);*/
 
$path = "images";
if(!rrmdir($path)) {
  echo ("Could not remove $path");
}
?>