<style>
	.statuscode {
		text-align: center;
		margin-top: 300px;
	}
  body {
    background: #eee;
    font: 12px Lucida sans, Arial, Helvetica, sans-serif;
  	color: #333;
  	text-align: center;
  }
	</style>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$url= $_POST["url"];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.4");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT,10);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpcode == "200")  {
	print "<div class=\"statuscode\"><h2>OK</h2></div>";
}

else {
 print "<div class=\"statuscode\"><h2>Something is not OK!</h2></div>";

}


?>
