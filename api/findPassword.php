<?php
	include 'conn.php';
	if (isset($_POST['userId'])&&$_POST['userId']!=""){
		$userId=$_POST['userId'];
		if($result=mysqli_query($conn,"SELECT users.userName and users.passWord and users.phoneNumber FROM users WHERE users.userId=$userId")){
			$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
			echo json_encode($rows);//返回用户名，头像，留言内容，留言时间
		}
	}