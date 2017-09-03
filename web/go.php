<?php
$flow = $_POST[ 'flow' ];
$url = $_POST[ 'm' ];
$flow = ( int )$_POST[ "flow" ];
$arr = get_headers( $url, true );
if ( $flow < 10 || $flow > 10240 ) {
	echo( "<script>alert('输入流量范围在10-10240之间，请重新输入');window.location.href='/';</script>" );
} else if ( !preg_match( '/200/', $arr[ 0 ] ) ) {
	echo( "<script>alert('免流地址失效，重新选择');window.location.href='/';</script>" );
} else {
	$size = $arr[ 'Content-Length' ];
}
$n = ( int )( $flow * 1024 / 222.35 );
?>
<!doctype html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>任务执行中</title>
	<link href="../css/style.css" rel="stylesheet">
</head>

<body>
<div class="container">
	<h1 class="header">任务执行中</h1>
	<h2>刷任务速度，与当前网速有关!请耐心等待</h2>
	<div class="list">
		<p>创建任务总量为:<b><? echo($n); ?></b></p>
		<p>已完成任务总量:<b id="finish_n">0</b></p>
		<p>流量总额为:<b><? echo($flow) ?></b>M</p>
		<p>已完成流量为:<b id="finish_flow_n">0</b>M</p>
		<p class="note">已完成流量仅供参考</p>
	</div>
	<div class="warning">
		<p>注意:请勿关闭浏览器</p>
	</div>
	<div style="text-align: center;">
		<a class="jion_group" target="_blank" href="https://shang.qq.com/wpa/qunwpa?idkey=67d26a204cb44273c3e1b7a9fcc1bb856575d2b4f6b83aadb50f1fe5bdd14b74">点击加入交流群</a>
	</div>
	<div class="patent">
		<p style="text-align: center;margin: 20px auto;">Copyright@ fengkmm(忆) </p>
	</div>
</div>
	<script src="../js/jquery-3.2.1.js"></script>
	<script src="../js/js.js"></script>
	<script>
	for(var i=0;i<5;i++)
      exec("<? echo($url);?>",<? echo($n); ?>,0);
	</script>
	<script type="text/javascript">
		var cnzz_protocol = ( ( "https:" == document.location.protocol ) ? " https://" : " http://" );
		document.write( unescape( "%3Cspan style='display:none'; id='cnzz_stat_icon_1262167114'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1262167114%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E" ) );
	</script>
</body>
</html>