<?php
	include 'conn.php';
	$valid=false;
	if (isset($_POST['send'])&&$_POST['send']==1) {
		if (isset($_POST['userId'])&&$_POST['userId']!="") {
			$userId=(int)$_POST['userId'];
			if(mysqli_query($conn,"delete from users where userId=$userId")){
				$message="删除账户";
				if(mysqli_query($conn,"delete from comments where userId=$userId")){
					$message="删除留言";
					if(mysqli_query($conn,"delete from chatlist where userId=$userId")){
						$message="删除聊天室";
						$valid=true;
					}
				}
				
			}else{
				$message=mysqli_error($conn);
			}
		}else{
			$message="账户信息失效，重新注册";
		}
	}else{
		$message="send没有";
	}
	echo json_encode(array("valid"=>$valid,"message"=>$message),JSON_UNESCAPED_UNICODE);