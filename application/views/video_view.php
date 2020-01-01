<style>
#h2_head {
	text-align: center;
	font-size: 16px;
	margin-bottom: 10px;
}
.white-popup {
	position: relative;
	background: #FFF;
	color: #000;
	padding: 20px 20px 20px 20px;
	width: auto;
	max-width: 700px;
	margin: 20px auto;
	background-image: url(images/popup_bg.jpg);
}
.mfp-content {
	background-color: #fff;
	padding: 15px;
	padding-bottom: 30px;
	margin: 20px auto;
}
.fromclose {
	float: right;
	font-size: 14px;
}
#vidoe_div {
	text-align: center;
}
#video_frame {
	height: 400px;
	width: 650px;
}
@media(max-width:500px) {
#video_frame {
	height: 190px;
	width: 250px;
}
}
@media(min-width:500px) and (max-width:850px) {
#video_frame {
	height: 270px;
	width: 430px;
}
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<h2 id="h2_head"><?=$video[0]['video_name']?><a class="popup-modal-dismiss fromclose" href="#">Close</a></h2>
<div id="video_div">
<iframe id="video_frame" src="<?=$video[0]['video_url']?>" frameborder="0" allowfullscreen></iframe>
</div>
</body>
</html>
