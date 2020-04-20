<!DOCTYPE html>
<html>
<head><link rel="icon" href="https://cdn2.iconfinder.com/data/icons/social-18/512/Facebook-2-512.png" type="image/x-icon" />
<title>FBTool | Add List ID</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">#NĐN</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Trang chủ</a></li>
      <li><a href="/index.php">Get List ID</a></li>
      <li><a href="/addid.php">Add List ID</a></li>
    </ul>
  </div>
</nav>
<!--end-->
    <center>
  <div class="container">    
            
    <div id="signupbox" style="margin-top: 25px;" class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Add List ID Facebook</h3>
				</div>
            <div class="panel-body">
                <form action="" method="POST">
<input type="text" class="form-control" name="token" placeholder="Nhập access token vào đây..."/><br/>
<textarea name="id" rows="10" class="form-control" placeholder="Nhập list UID vào đây...."></textarea>
</div>
  <button name="addid" class="btn btn-primary">Add ID</button><br/></form>
<br />
<br/>
<?php
$d = 0;
$f = 0;
$token = $_POST['token'];
$id = $_POST['id'];
$getlist  = explode("\r\n", $id);
if(isset($_POST['addid'])){
	foreach($getlist as $idfr){
		$curls = auto('https://graph.facebook.com/me/friends?uid='.$idfr.'&access_token='.$token.'&method=POST');
		$curl = json_decode($curls, true);
		if($curl == 'true'){
			$d += 1;
			echo "<b>Kết bạn thành công với <span style='color:#33CC33'>$idfr</span> </b>";
			echo "<br/>";
		}else{
			$f += 1;
			echo "<b>Không thể kết bạn với <span style='color:red'>$idfr</span> </b>";
			echo "<br/>";
		}
	}
}
?>
<br/>
<hr/>
<b>Thành công: <?php echo $d; ?> ID</b>
<br/>
<b>Thất bại: <?php echo $f; ?> ID</b>
</center>

</div></div></div></div></div></div></center>
</body>
</html>
<?php
function auto($url){
	$data = curl_init();
	curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($data, CURLOPT_URL, $url);
	$hasil = curl_exec($data);
	curl_close($data);
	return $hasil;
}
?>
<!--
// Creator by Nguyen Dang Nhat
// fb.com/100005060679804
// Blog.Omfg.Vn 
// J2Team
-->