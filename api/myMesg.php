<?php
	//查找留言
	include 'conn.php';
	if (isset($_POST['userId'])&&$_POST['userId']!=""){
		$userId=$_POST['userId'];
		if($result=mysqli_query($conn,"SELECT users.userName,chatList.chatId,chatList.title,chatContent.chatBody,chatContent.createTime FROM users,chatList,chatContent WHERE users.userId=$userId and chatContent.userId=$userId and chatContent.chatId=chatList.chatId")){
			$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
			echo json_encode($rows);//返回用户名，头像，留言内容，留言时间
		}
	}