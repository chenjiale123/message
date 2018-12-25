<?php
  include 'conn.php';
  $valid = true;
  $message = '';
  if(!isset($_COOKIE["username"])){
    echo json_encode(
    array('vaild' => false,'isLogin' =>'您未登陆'),JSON_UNESCAPED_UNICODE
    );
    exit();
  }
  if(isset($_GET['chatId']) && $_GET['chatId']!=""){
    $sql = 'SELECT * FROM (chatContent LEFT JOIN chatList ON chatContent.chatId=chatList.chatId) LEFT JOIN users ON chatContent.userId=users.userId AND chatContent.chatId=chatList.chatId WHERE chatContent.chatId='.$_GET['chatId'].' ORDER BY chatContent.createTime,chatContent.id ASC';
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
      $message = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
      $valid = false;
      $message = [];
    }
  }else{
    $valid = false;
    $message = 'error sorry';
  }
  echo json_encode(
    array('valid'=>$valid,'message'=>$message),JSON_UNESCAPED_UNICODE
);
