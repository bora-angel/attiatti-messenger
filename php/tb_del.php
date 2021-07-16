<?php
if(!isset($_COOKIE['atti_id'])){
echo "<script> alert('로그인해주세요(쿠키없음).'); location.replace('./first.php');</script>";
}   

$atti_id = $_COOKIE['atti_id'];
$atti_pw = $_COOKIE['atti_pw'];
$del_telnum = $_POST['del_telnum'];

include "../inc/info.inc";

$atti_connect = mysqli_connect("localhost",$my_id,$my_pw,$my_db);
                
$confirm_del = $_POST['del_submit'];

$del_sql = "delete from `atti_user_telbook` where tb_user_id ='".$atti_id."' AND tb_telnum = '".$del_telnum."'";


if($confirm_del=="true"){
    $result_del = mysqli_query($atti_connect, $del_sql);
    echo "<script>alert('삭제 완료되었습니다.'); location=\"./main.php\";</script>";
    exit;
}else{
    echo "<script>alert('삭제를 취소하였습니다.'); location=\"./main.php\";</script>";
    exit;
}

if(!mysqli_query($atti_connect, $del_sql)){
    echo "<script>alert('삭제를 실패하였습니다.'); </script>";
    mysqli_error(mysqli_query($atti_connect, $del_sql));
}

mysqli_free_result($result_del);
    
?>