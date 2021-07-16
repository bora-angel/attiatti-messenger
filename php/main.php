<?php
    if(!isset($_COOKIE['atti_id'])){
        echo "<script> alert('로그인해주세요(쿠키없음).'); location.replace('./first.php');</script>";
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>windows 98 - attiatti</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="../css/total.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<p class="portfolio_p">본 페이지는 포트폴리오용으로 제작된 홈페이지입니다.</p>
    <section class="desk_top">
        <article class="wall_paper"> <!--바탕화면 영역과 아이콘을 나타내는 태그들-->
            <a class="mycom_total common_btn" id="mycom_total">
                <img src="../img/icons/mycom_icon.png" alt="mycom icon" class="mycom_icon comm_icon"/>
                <p class="mycom_p">내 컴퓨터</p>
            </a>
            <a class="common_btn" id="network_total">
                <img src="../img/icons/network_icon.png" alt="network icon" class="network_icon comm_icon"/>
                <p class="network_p">네트워크 환경</p>
            </a>
            <a class="common_btn" id="waste_total">
                <img src="../img/icons/waste_icon.png" alt="waste icon" class="waste_icon comm_icon"/>
                <p class="waste_p">휴지통</p>
            </a>
            <a class="common_btn" id="internet_total">
                <img src="../img/icons/internet_icon.png" alt="internet icon" class="internet_icon comm_icon"/>
                <p class="internet_p">인터넷</p>
            </a>
            <a class="common_btn" id="mydir_total">
                <img src="../img/icons/mydir_icon.png" alt="mydir icon" class="mydir_icon comm_icon"/>
                <p class="mydir_p">내 문서</p>
            </a>
            <a class="atti_total" id="atti_total">
                <img src="../img/icons/atti_icon.png" alt="atti icon" id="attib_icon" class="atti_bicon comm_icon"/>
                <p class="atti_bp">아띠아띠</p>
            </a>
        </article>
            <!--아띠아띠 화면 태그-->
        <article class="atti_window" id="atti_window">
            <div class="atti_blue">
                <img src="../img/icons/atti_icon.png" alt="atti icon" class="atti_wicon"/>
                <p class="atti_wp">아띠아띠</p>
                <span class="btn_box">
                    <button id="underbar_btn">__</button>
                    <button class="x_btn" id="x_btn">X</button>
                </span>
            </div>
            <div class="atti_grey">
                <nav class="btn_area">
                    <button id="logout_btn" class="top_btn">로그아웃</button>
                    <button id="insert_btn" class="top_btn">추가</button>
                    <form action="./user_del.php" method="post">
                        <input type="hidden" value="" name="del_submit" id="del_submit">
                        <button id="delete_btn" class="top_btn">탈퇴</button>
                    </form> 
                    <button id="help_btn" class="top_btn">도움말</button>
                </nav>
                <hr class="main_line top_line"></hr>
                <div class="user_info">
<?
                    $atti_id = $_COOKIE['atti_id'];
                    $atti_pw = $_COOKIE['atti_pw'];

                    include "../inc/info.inc";
                    $atti_connect = mysqli_connect("localhost",$my_id,$my_pw,$my_db);
                    
                    $admin_sql = "select * from `atti_admin` where admin_id = '".$atti_id."' AND admin_pw = password('".$atti_pw."')";
                    $login_user_sql = "select * from `atti_user` where user_id ='".$atti_id."' AND user_pw = password('".$atti_pw."')";

                    $user_sql = "select * from `atti_user`";
                    $in_tbsql = "select * from `atti_user_telbook`";
                    $tb_sql = "select * from `atti_user_telbook` where tb_user_id ='".$atti_id."' AND tb_user_pw = password('".$atti_pw."')";
                
                    $admin_result = mysqli_query($atti_connect, $admin_sql);
                    $login_user_result = mysqli_query($atti_connect, $login_user_sql);
                    $user_result = mysqli_query($atti_connect, $user_sql);
                    $tb_result = mysqli_query($atti_connect, $tb_sql);
                    $intb_result = mysqli_query($atti_connect, $in_tbsql);
                    
                    $main_flag;

                    if(mysqli_num_rows($admin_result)){
                        #로그인 한 자가 관리자임.
                        $main_row = mysqli_fetch_assoc($admin_result);
                        $main_flag = 'admin';
                        $main_filetype = pathinfo($main_row['admin_photo_filename'],PATHINFO_EXTENSION);
                    }else{
                        #로그인한 자가 일반 사용자임.
                        $main_row = mysqli_fetch_assoc($login_user_result);
                        $main_flag = 'user';
                        $main_filetype = pathinfo($main_row['user_photo_filename'],PATHINFO_EXTENSION);
                    }

                    #데이터베이스에는 임시파일명으로만 저장이 되어있기 때문에 확장자명 확인과정 필요.                   
                    echo '<p class="user_name">&nbsp;'.$main_row[$main_flag.'_name'].'('.$atti_id.')</p>';
                    echo '<p class="user_tel">&nbsp;'.$main_row[$main_flag.'_telnum'].'</p>';
                    echo '<img class="user_pic" src="../img/temp/tmp'.$main_row[$main_flag.'_photo'].'">';

?>
                </div>
                <hr class="main_line second_line"></hr>
                <div class="list_area">
<?

    if(!$atti_connect){
        echo "db connect error: ".mysqli_error($atti_connect);
        exit;
    }

    if(!$admin_result){
        echo "관리자".mysqli_error($admin_result);
    }else if(!$user_result){
        echo "유저".mysqli_error($user_result);
    }else if(!$tb_result){
        echo "유저텔북".mysqli_error($tb_result);
    }

    if(!mysqli_select_db($atti_connect, "c11st25")){
        echo "db select error";
        exit;
    }

    $atti_dbrow; $i; $atti_indb;
    if(mysqli_num_rows($admin_result)){
        #관리자 출력
        $i=1;
        while($atti_dbrow = mysqli_fetch_assoc($user_result)){
            echo '<li class="list_people" id="user_mem'.$i.'">'.$atti_dbrow['user_name'].'('.$atti_dbrow['user_telnum'].')</li>';
            while($atti_indb = mysqli_fetch_assoc($intb_result)){
            #윗줄에 해당하는 유저db의 아이디와 패스워드가 부합하는 tb의 목록
                if($atti_indb['tb_user_id'] == $atti_dbrow['user_id'] && $atti_indb['tb_user_pw']==$atti_dbrow['user_pw']){
                    echo '<ul class="in_list"><li class="comm_li">';
                    echo $atti_indb['tb_name']."(".$atti_indb['tb_telnum'].")";
                    echo '</li></ul>';
                }
            }
            $i++;
            $intb_result = mysqli_query($atti_connect, $in_tbsql);
        }
    }else{
        #유저 출력
        $i=1;
        while($atti_dbrow = mysqli_fetch_assoc($tb_result)){
            echo '<form action="./info.php" id="hidden_num'.$i.'" method="post">';
            echo '<input type="hidden" id="sub_hidden'.$i.'" name="sub_hidden" value="'.$atti_dbrow['tb_telnum'].'" >';
            echo '<li class="list_people" id="user_mem'.$i.'">'.$atti_dbrow['tb_name'].'('.$atti_dbrow['tb_telnum'].')';
            echo '</li></form>';
            $i++;
        }
    }
?>                  
                </div>
                <hr class="main_line"></hr>
                <form method="get" action="#" class="search_area">
                    <input type="text" name="search_text" placeholder="검색 기능은 지원하지 않습니다." class="search_text">
                    <input type="submit" name="search_submit" value="검색" class="search_submit">
                </form>
                <hr class="main_line"></hr>
                <!--메신저 창의 최하단 이름,아이디 표시칸-->
                <div class="bottom_area">
<?php                    
                    echo '<div class="bottom_stat">&nbsp;'.$main_row[$main_flag.'_name'].'('.$atti_id.')</div>';
                    echo '<div class="bottom_stat center_stat">&nbsp;접속</div>';
                    echo '<div class="bottom_stat right_stat">&nbsp;</div>';
                    mysqli_free_result($admin_result);
                    mysqli_free_result($login_user_result);
                    mysqli_free_result($user_result);
                    mysqli_free_result($tb_result);
                    mysqli_free_result($intb_result);
?>
                </div>
            </div>
        </article>

        <!-- 작업표시줄 태그 -->
        <article class="task_bar" id="task_bar">
            <a class="task_start">
                <img src="../img/icons/windows_logo.png" alt="windows 98 logo" class="windows_logo"/>
                <p class="task_start_p">시작</p>
            </a>
            <a class="atti_bar" id="atti_bar">
                <img src="../img/icons/atti_icon.png" alt="attiatti icon" class="atti_ticon"/>
                <p class="atti_tp">아띠아띠</p>
            </a>
            <a class="atti_none_bar" id="atti_none_bar">
                <img src="../img/icons/atti_icon.png" alt="attiatti icon" class="atti_ticon"/>
                <p class="atti_tp">아띠아띠</p>
            </a>
            <span class="clock_bar" id="clock_bar">
                <p class="clock_box" id="clock_box">&nbsp;</p>
            </span>
        </article>
    </section>
    <script>

    /* 작업표시줄 우측 하단의 시계 실시간 시간표시 */
    function real_time(){
            let task_time = new Date();
            let tt_hours = task_time.getHours();
            let tt_minutes = task_time.getMinutes();
            if(tt_hours<12){
                document.getElementById("clock_box").innerHTML = "오전 "+tt_hours+":";
                if(tt_minutes<10){
                    document.getElementById("clock_box").innerHTML += "0"+tt_minutes;
                }else{
                    document.getElementById("clock_box").innerHTML += tt_minutes;
                };
            }else{
                document.getElementById("clock_box").innerHTML = "오후 "+(tt_hours-12)+":";
                if(tt_minutes<10){
                    document.getElementById("clock_box").innerHTML += "0"+tt_minutes;
                }else{
                    document.getElementById("clock_box").innerHTML += tt_minutes;
                };
            }
        }
    setInterval("real_time()",50);

        let window_flag = 1;

        const submit_join = document.getElementById("submit_join");
        const logout_btn = document.getElementById("logout_btn");
        const insert_btn = document.getElementById("insert_btn");
        const delete_btn = document.getElementById("delete_btn");

        function confirm_del(id){  
        const confirm_result = confirm("탈퇴하시겠습니까?");
        document.getElementById(id).value = confirm_result;
        document.getElementById("del_submit").submit();

        }  
        //창을 내리고 닫을 수 있게 하는 이벤트
        this.addEventListener("click",(e)=>{
            let atti_window = document.getElementById("atti_window");
            let atti_bar = document.getElementById("atti_bar");
            let atti_none_bar = document.getElementById("atti_none_bar");
            let tmp_num = e.target.id.slice(-1);
            

            switch(e.target.id){

                    case "attib_icon":
                    atti_window.style.display = "block";
                    atti_bar.style.visibility = "visible";
                    atti_bar.style.display = "inline-block";
                    atti_none_bar.style.display = "none"
                    return window_flag = 1;
                    break;          

                    case "user_mem"+tmp_num:
                    function tmp_func(){
                        document.getElementById("hidden_num"+tmp_num).submit();
                    }
                    return tmp_func();
                    break;
                    
                    case "x_btn":
                    atti_window.style.display = "none";
                    atti_bar.style.visibility = "hidden";
                    atti_none_bar.style.display = "none";
                    history.back();

                    return window_flag = 1;
                    break;
                    
                    case "underbar_btn":
                    atti_window.style.display = "none";
                    atti_bar.style.display = "none";
                    atti_none_bar.style.display = "inline-block";
                    return window_flag = 1;
                    break;

                    case "atti_none_bar":
                    if( window_flag == 1){
                        atti_window.style.display = "block";
                        atti_bar.style.display = "inline-block";
                        atti_none_bar.style.display = "none";
                        return window_flag = 1;
                    }else{
                        atti_window.style.display = "none";
                        atti_bar.style.display = "inline-block";
                        atti_none_bar.style.display = "none";
                        return window_flag = 0;
                    }
                    break; 

                    case "atti_bar":
                    atti_window.style.display = "none";
                    atti_none_bar.style.display = "inline-block";
                    atti_bar.style.display = "none";
                    break; 

                    case "insert_btn":
                    function insert_btn(){
                        location.href="./tb_insert.php";
                    }
                    return insert_btn();
                    break;

                    case "delete_btn":
                    return confirm_del("del_submit");
                    break;

                    case "help_btn":
                        alert("본 홈페이지는 포트폴리오 목적으로 제작되었습니다.");
                    break;

                    case "logout_btn":
                    location.replace("./logout.php");
                    break;
                }

            });

    </script>
</body>
</html>