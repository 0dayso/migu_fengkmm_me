<?php
$ACTION = $_POST['a'];
$ACTION_DATA = $_POST['d'];
if($ACTION=="geturl"){
	require("getURL.php");
	echo(getURL());
}
if($ACTION=="getURL"){
	require("getURL.php");
	echo(getURL());
}
if($ACTION=="getflow"){
	require("getFlow.php");
	echo(get_Flow($ACTION_DATA));
}
