<?php 

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ipaddresi = get_client_ip();
if (strstr($ipaddresi, ', ')) {
    $ips = explode(', ', $ipaddresi);
    $ipaddresi = $ips[0];
}


$date = (new DateTime())->setTimeZone(new DateTimeZone('Europe/Moscow'))->format('Y-m-d H:i:s');
fwrite($file,$hits[0].') '. $date . '| ' . $ip."\n"); 
fclose($file);
echo "<script src='https://platform.linkedin.com/badges/js/profile.js' async defer type='text/javascript'></script><br><br><br><center>hi <b>" . $ipaddresi . "</b>. preciated to see you here.";
echo "<br>me? just star dust, nothing more.. and known as sometimes who code.";
echo "<br><br><br><br><iframe width='560' height='315' src='https://www.youtube-nocookie.com/embed/wZuW3YvHHLU?controls=0' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe><br><br><br><br><div class='badge-base LI-profile-badge' data-locale='tr_TR' data-size='medium' data-theme='light' data-type='VERTICAL' data-vanity='ahmetgoksu' data-version='v1'><a class='badge-base__link LI-simple-link' href='https://tr.linkedin.com/in/ahmetgoksu?trk=profile-badge'>Ahmet Göksu</a></div><br><br>hello@goksu.in</center>";
?>
