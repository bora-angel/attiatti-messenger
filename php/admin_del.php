<?php
if(!isset($_COOKIE['atti_id'])){
echo "<script> alert('로그인해주세요(쿠키없음).'); location.replace('./first.php');</script>";
}   
                
include "../inc/info.inc";

$atti_connect = mysqli_connect("localhost",$my_id,$my_pw,$my_db);
                
$confirm_del = $_POST['del_submit'];

$del_telnum = $_POST['del_telnum'];
$del_id = $_POST['del_id'];
$del_name = $_POST['del_name'];
$del_flag = $_POST['del_flag'];


if($del_flag == "user"){
    #전화번호부 사용자를 삭제하는 경우
    $user_sql = "delete from `atti_user` where user_id ='".$del_id."' AND user_name ='".$del_name."'";

    if($confirm_del=="true"){
        mysqli_query($atti_connect, $user_sql);
        echo "<script>alert('삭제가 완료되었습니다.'); location=\"./admin_main.php\";</script>";
        exit;
    }else{

        echo "<script>alert('삭제를 취소하였습니다.'); location=\"./admin_main.php\";</script>";
        exit;
    }
}else{
    #사용자의 전화번호부를 삭제하는 경우
    $del_sql = "delete from `atti_user_telbook` where tb_user_id ='".$del_id."' AND tb_telnum = '".$del_telnum."' ";

    if($confirm_del=="true"){
        mysqli_query($atti_connect, $del_sql);
        echo "<script>alert('삭제가 완료되었습니다.'); location=\"./admin_main.php\";</script>";
        exit;    

    }else{
        echo "<script>alert('삭제가 취소되었습니다.'); location=\"./admin_main.php\";</script>";
        exit;
    }
}

mysqli_free_result(mysqli_query($atti_connect, $del_sql));
    
?>