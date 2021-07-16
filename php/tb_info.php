
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
<!--아띠아띠 유저 정보 수정 창 태그-->
            <article  class="join_window" id="join_window">
            <div class="join_blue">
                <img src="../img/icons/atti_icon.png" alt="atti icon" class="atti_wicon"/>
                <p class="atti_wp">아띠아띠</p>
                <span class="btn_box">
                    <button class="underbar_btn" id="join_unbar">__</button>
                    <button class="x_btn" id="x_btn">X</button>
                </span>
            </div>
            <div class="join_grey">
                <h4 class="join_title">친구 정보</h4>
                <hr class="join_line">
                <form action="./join_user.php" method="post" class="info_form" enctype="multipart/form-data">
<?php
                $atti_id = $_COOKIE['atti_id'];
                $atti_pw = $_COOKIE['atti_pw'];
                
                include "../inc/info.inc";
                $atti_connect = mysqli_connect("localhost",$my_id,$my_pw,$my_db);
                
                $atti_num = $_GET['sub_hidden'];
                $sub_sql = "select * from `atti_user_telbook` where tb_user_id ='".$atti_id."' AND tb_telnum = '".$atti_num."' ";
                $tb_result = mysqli_query($atti_connect, $sub_sql);
                
                while($atti_subdb =mysqli_fetch_assoc($tb_result)){
                        $sub_filetype = pathinfo($atti_subdb['tb_photo_filename'],PATHINFO_EXTENSION);
                        echo '<img src="../img/temp/'.$atti_subdb['tb_photo'].'.'.$sub_filetype.'" alt="user friend picture" class="friend_pic">';

                        echo '<ul class="name_info info_ul"><li class="top_li">'.$atti_subdb['tb_name'].'</li></ul>';
                        echo '<ul class="telnum_info info_ul"><li class="top_li">'.$atti_subdb['tb_telnum'].'</li></ul>';
                        echo '<hr class="info_line">';

                        echo '<ul class="gender_info info_ul"><p class="comm_title">성별</p><li class="info_li gender_li">'.$atti_subdb['tb_sex'].'</li></ul>';
                        echo '<ul class="birth_info info_ul"><p class="comm_title">생년월일</p><li class="info_li birth_li">'.$atti_subdb['tb_birth'].'</li></ul>';
                        echo '<ul class="email_info info_ul"><p class="comm_title">이메일</p><li class="info_li email_li">'.$atti_subdb['tb_email'].'</li></ul>';
                        echo '<ul class="address_info info_ul"><p class="comm_title">주소</p><li class="info_li address_li">'.$atti_subdb['tb_address'].'</li></ul>';
                    
                        echo '<hr class="info_line">';
                        echo '<ul class="memo_info info_ul"><p class="memo_title">메모</p><li class="info_li memo_li">'.$atti_subdb['tb_etc'].'</li></ul>';
                }
                mysqli_free_result($tb_result);
?>                    
                    <hr class="info_line">
                    <label for="modify_submit">
                        <input type="submit" name="modify_submit" class="comm_f submit_modify" id="submit_modify" value="수정">
                    </label>
                    <label for="del_submit">
                        <input type="submit" name="del_submit" class="comm_f submit_del" id="submit_del" value="삭제">
                    </label>
                    <label for="input_submit">
                        <input type="submit" name="input_submit" class="comm_f submit_input" id="submit_input" value="등록">
                    </label>
                </form>
            </div>
        </article>
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
        let join_us = document.getElementById("join_us");
        let rancan_num = 0;

        const submit_join = document.getElementById("submit_join");
        const logout_btn = document.getElementById("logout_btn");
        const insert_btn = document.getElementById("insert_btn");
        const delete_btn = document.getElementById("delete_btn");

        const list_people = document.getElementsByClassName("list_people");

        //창을 내리고 닫을 수 있게 하는 이벤트
        this.addEventListener("click",(e)=>{
        let join_window = document.getElementById("join_window");
        let atti_bar = document.getElementById("atti_bar");
        let atti_none_bar = document.getElementById("atti_none_bar");
        let tmp_num = e.target.id.slice(-1);
        const delete_btn = document.getElementById("delete_btn");

        switch(e.target.id){

                case "attib_icon":
                join_window.style.display = "block";
                atti_bar.style.visibility = "visible";
                atti_bar.style.display = "inline-block";
                atti_none_bar.style.display = "none"
                return window_flag = 1;
                break;          
                
                case "x_btn":
                join_window.style.display = "none";
                atti_bar.style.visibility = "hidden";
                atti_none_bar.style.display = "none";
                history.back();
                return window_flag = 1;
                break;
                
                case "underbar_btn":
                join_window.style.display = "none";
                atti_bar.style.display = "none";
                atti_none_bar.style.display = "inline-block";
                return window_flag = 1;
                break;

                case "atti_none_bar":
                if( window_flag == 1){
                    join_window.style.display = "block";
                    atti_bar.style.display = "inline-block";
                    atti_none_bar.style.display = "none";
                    return window_flag = 1;
                }else{
                    join_window.style.display = "none";
                    atti_bar.style.display = "inline-block";
                    atti_none_bar.style.display = "none";
                    return window_flag = 0;
                }
                break; 

                case "atti_bar":
                join_window.style.display = "none";
                atti_none_bar.style.display = "inline-block";
                atti_bar.style.display = "none";
                break; 
                
            }
            
        });
    </script>
</body>
</html>