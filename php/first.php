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
 <p class="portfolio_p">본 페이지는 포트폴리오용으로 제작된 홈페이지입니다.<br><br> 관리자 ID, PW : c11st25</p>
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
        <!--아띠아띠 로그인 창 태그-->
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
                <img src="../img/icons/attiatti_logo.png" alt="attiatti logo" class="atti_logo"/>
                <form action="../php/login_ok.php" method="post">
                    <label class="idpw_lable">아이디
                        <input type="text" name="atti_id" class="comm_idpw" tabindex=1>
                    </label>
                    <label class="idpw_lable pw_label">비밀번호
                        <input type="password" name="atti_pw" class="comm_idpw" tabindex=5>
                    </label>
                    <hr class="login_line">
                    <button type="button" class="join_us" id="join_us" tabindex=15>신규가입</button>
                    <label>
                    <input type="submit" value="접속" tabindex=10 name="submit" class="sub_btn" id="sub_btn">
                    </label>
                </form>
                <hr class="login_line">
                <p class="login_p">아이디와 비밀번호를 입력하세요~</p>
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
                        atti_window.style.display = "none";
                        document.getElementById("hidden_num"+tmp_num).submit();
                    }
                    return tmp_func();
                    break;

                    case "join_us":
                        
                    atti_window.style.display = "none";
                    atti_bar.style.display = "inline-block";
                    atti_none_bar.style.display = "none";
                    return location.href="./join.php";
                    break;

                    case "x_btn":
                    atti_window.style.display = "none";
                    atti_bar.style.visibility = "hidden";
                    atti_none_bar.style.display = "none";
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
                    
                }

            });

    </script>
</body>
</html>