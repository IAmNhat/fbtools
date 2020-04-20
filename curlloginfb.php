<?php

//Group : https://www.facebook.com/groups/devdanang


//username and password of account
$username = $_GET['tk'];
$password = $_GET['pass'];

$postinfo = "email=".urlencode($username)."&pass=".urlencode($password).'&login=Login';

$cookie_file_path =  dirname(__FILE__) . "/cookie.txt";

unlink ($cookie_file_path);

$html = curl_post('https://m.facebook.com/login.php', 'POST' , $postinfo , $cookie_file_path);
$re = "/c_user=(.*?);/";
preg_match($re, $html, $uid);
echo $uid[1]."<br/>";
if (!$uid) {
echo 'Acc Này Sai Cmnr';

}
else {
    echo 'Acc này đúng cmnr thử vô xem có checkpoint không nào =))~'; 
}
    
function curl_post($url, $method, $postinfo, $cookie_file_path) {

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

 curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
//set the cookie the site has for certain features, this is optional
curl_setopt($ch,CURLOPT_COOKIEFILE, $cookie_file_path);
//curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
curl_setopt($ch, CURLOPT_USERAGENT,
	"Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
if ($method=='POST') 
{
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
}
$html = curl_exec($ch);
curl_close($ch);
return $html;
}
?>