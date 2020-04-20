<?php 
$token = '';
$get_friend = json_decode(file_get_contents('https://graph.fb.me/me/friends?access_token='.$token.'&fields=gender&method=get'), true);
foreach ($get_friend['data'] as $fr) {
	if($fr['gender'] == 'female'){
		$list[] = $fr['id'];
	}
}
sleep(2);
$success = 0;
$failed = 0;
foreach ($list as $a) {
	$ok = json_decode(file_get_contents('https://graph.facebook.com/me/friends?uid='.$a.'&access_token='.$token.'&method=delete'), true);
	if ($ok == 'true') {
		$success++;
	} else {
		$failed++;
	}
}
echo 'Xoa thanh cong <font color="green">'.number_format($success).'</font> Friend <br> Xoa that bai <font color="red">'.number_format($failed).'</font> Friend';
?>