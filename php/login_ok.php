<?php
    $atti_id = $_POST['atti_id'];
    $atti_pw = $_POST['atti_pw'];

    include "../inc/info.inc";
    $atti_connect = mysqli_connect("localhost",$my_id,$my_pw,$my_db);
    $admin_sql = "select * from `atti_admin` where admin_id = '".$atti_id."' AND admin_pw = password('".$atti_pw."')";
    $user_sql = "select * from `atti_user` where user_id = '".$atti_id."' AND user_pw = password('".$atti_pw."')";

    $admin_result = mysqli_query($atti_connect, $admin_sql);
    $user_result = mysqli_query($atti_connect, $user_sql);

    if(!mysqli_query($atti_connect, $user_sql)||!mysqli_query($atti_connect, $admin_sql)){
        echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.'); history.back();</script>";
    }

    $admin_row_count = mysqli_num_rows($admin_result);
    $user_row_count = mysqli_num_rows($user_result);


    #@는 warning문구 무시하게 해줌.
    $admin_record = mysqli_fetch_assoc($admin_result);
    $user_record = mysqli_fetch_assoc($user_result);
    
    if($admin_record>0){
        $atti_name_search = $admin_record["admin_name"];
    }else{
        $atti_name_search = $user_record["user_name"];
    }

    mysqli_free_result($admin_result);
    mysqli_free_result($user_result);
    mysqli_close($atti_connect);

    if($admin_row_count == 0 ){
        echo "<script>alert('관리자 데이터 베이스의 내용이 없다.');</script>";
        if($user_row_count == 0){
            echo "<script>alert('유저 데이터 베이스의 내용이 없다.'); history.back(); </script>";
            exit;
        }else{
            #유저 로그인
            setcookie("atti_id",$atti_id, time()+86400,'/');
            setcookie("atti_pw",$atti_pw, time()+86400,'/');
            echo "<script>alert('로그인 성공'); location='./main.php'; </script>";
        }
        exit;
    }else{
        #관리자 로그인
        setcookie("atti_id",$atti_id, time()+86400,'/');
        setcookie("atti_pw",$atti_pw, time()+86400,'/');
    echo "<script>alert('로그인 성공');  location='./admin_main.php';</script>";
        exit;
    }


?>
