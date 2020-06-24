<?php 
$file = fopen("ip.txt","a");
$count_my_page = "ziyaret.txt";
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp);
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$date = (new DateTime())->setTimeZone(new DateTimeZone('Europe/Moscow'))->format('Y-m-d H:i:s');
fwrite($file,$hits[0].') '. $date . '| ' . $ip."\n"); 
fclose($file);
echo "<center>hi " . $ip . ". preciated to see you here. me? just a star dust, nothing more.. and sometimes code.";
echo "<br><br><iframe width='560' height='315' src='https://www.youtube-nocookie.com/embed/wZuW3YvHHLU?controls=0' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></center>";
?>
