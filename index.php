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

//ADD DB
//mysql://ba4c4a25dcad1f:92546991@eu-cdbr-west-03.cleardb.net/heroku_e3feb629aefce6d?reconnect=true
$servername = "eu-cdbr-west-03.cleardb.net";
$username = "ba4c4a25dcad1f";
$password = "92546991";
$dbname = "heroku_e3feb629aefce6d";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$sqltime = date('Y-m-d H:i:s');

// Create connection
try {
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO visitors (ip, url,time)
VALUES ('$ipaddresi', '$actual_link','$sqltime')";

if ($conn->query($sql) === TRUE) {
  
} else {
  
}

$conn->close();
}
//SET COOKIE

setcookie("0", "Hey my curios friend. This website is simple enough to not to have vulnerabilities -except 3rd parties that i used-. However, I want you to know that I appreciate your effort.", time() + (86400 * 30*12), "/");
setcookie("1", "It is said that from the outside I look frighteningly serious!!?? No man, I am friendly. Come and tell me these cookies. Cheers!", time() + (86400 * 30*12), "/");

echo "
<!DOCTYPE html>
<html>
<title>goksu 🧑‍💻</title>
<head><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=G-YW5JHJ19FS'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YW5JHJ19FS');
</script></head>
<body>

<br><br><br><center>hi <b><div style='display:inline-block;'title='this is your ip address'>" . $ipaddresi . "</div></b>. preciated to see you here.
<br>me? just star dust, nothing more.. and known as who <a href='https://github.com/goeksu'>code</a> sometimes.
<br><br><br><iframe width='560' height='315' src='https://www.youtube-nocookie.com/embed/wZuW3YvHHLU?controls=0' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe><br><br><br><a href='https://www.linkedin.com/in/ahmetgoksu'>Take me to LinkedIn</a><br><br><br>ahmet@goksu.in<br><a href='https://keybase.io/ahmetgoksu'><div title='need to talk private?'>PGP</div></a></center>

</body>
</html>


";
?>
