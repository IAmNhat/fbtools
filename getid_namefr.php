<!DOCTYPE html>
<html>
<head><link rel="icon" href="https://cdn2.iconfinder.com/data/icons/social-18/512/Facebook-2-512.png" type="image/x-icon" />
<title>FBTool | Get List ID Facebook</title>
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
					<h3 class="panel-title">Get List ID Of Friend Facebook</h3>
				</div>
            <div class="panel-body">
                <form action="" method="POST">
<input type="text" class="form-control" name="token" placeholder="Nhập access token vào đây..."/><br/>
<input type="text" class="form-control" name="limit" placeholder="Nhập số lượng ID cần get, để trống nếu muốn lấy toàn bộ list friend"/>
</div>
  <button name="form_click" class="btn btn-primary">LẤY ID</button><br/></form>
<br />
<br/>
<?php
if(isset($_POST['token'])){
$token = $_POST['token'];
};
if(isset($_POST['limit'])){
$limit = $_POST['limit'];
};
if(isset($_POST['form_click'])){
$stat=json_decode(file_get_contents('https://graph.facebook.com/1634059646831228/feed?format=json&fields=id&limit='.$limit.'&access_token='.$token.''),true);
?>
  <button class="js-textareacopybtn btn btn-success" style="vertical-align:top;">Sao chép</button>
<textarea  name="" class="form-control js-copytextarea" cols="30" rows="10">
    <?php
    $d = 0;
    for($i=0;$i<count($stat[data]);$i++){
    echo $stat['data'][$i]['id'];
    echo "\n";
    $d++;
}
}
?>
</textarea>
<br/>
</center>

</div></div></div></div></div></div></center>
<script>
    var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

copyTextareaBtn.addEventListener('click', function(event) {
  var copyTextarea = document.querySelector('.js-copytextarea');
  copyTextarea.focus();
  copyTextarea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }
});
</script>
</body>
</html>
<!--
// Creator by Nguyen Dang Nhat
// fb.com/100005060679804
// Blog.Omfg.Vn 
// J2Team
-->