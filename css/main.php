<?php
    include "../php/detach/head.php";
    include "../php/detach/wall_paper.php";
?>
            <!--아띠아띠 로그인 창 태그-->
            <article style="display:block" class="atti_window" id="atti_window">
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
                    <button id="delete_btn" class="top_btn">삭제</button>
                    <button id="helt_btn" class="top_btn">도움말</button>
                </nav>
                <hr class="main_line"></hr>
                <!--php-->
                <div class="user_info">
                    <p class="user_name">관리자(id)</p>
                    <p class="user_tel">010-1234-1234</p>
                    <img class="user_pic">
                </div>
                <hr class="main_line"></hr>
                <div class="list_area">
                <!--php-->
                    <ul class="list_people">1. 장보라 ( 010 - 1234 -1234)</ul>
                    <ul class="list_people">1. 장보라 ( 010 - 1234 -1234)</ul>
                    <ul class="list_people">1. 장보라 ( 010 - 1234 -1234)</ul>
                    <ul class="list_people">1. 장보라 ( 010 - 1234 -1234)</ul>
                    <ul class="list_people">1. 장보라 ( 010 - 1234 -1234)</ul>
                    <ul class="list_people">1. 장보라 ( 010 - 1234 -1234)</ul>         
                    <ul class="list_people">1. 장보라 ( 010 - 1234 -1234)</ul>
                </div>
                <hr class="main_line"></hr>
                <form method="get" action="search.php" class="search_area">
                    <input type="text" name="search_text" placeholder="검색" class="search_text">
                    <input type="submit" name="search_submit" class="search_submit">
                </form>
                <hr class="main_line"></hr>
                <!--php-->
                <div class="bottom_area">
                    <div class="bottom_stat">관리자(id)</div>
                    <div class="bottom_stat">접속</div>
                    <div class="bottom_stat">&nbsp;</div>
                </div>
            </div>
        </article>
                <!--아띠아띠 정보 창 태그-->
        <article class="join_window" id="join_window">
            <div class="join_blue">
                <img src="../img/icons/atti_icon.png" alt="atti icon" class="atti_wicon"/>
                <p class="atti_wp">아띠아띠</p>
                <span class="btn_box">
                    <button class="underbar_btn" id="join_unbar">__</button>
                    <button class="x_btn" id="join_x">X</button>
                </span>
            </div>
            <div class="join_grey">
                <h4 class="join_title">신규 가입</h4>
                <hr class="join_line">
                <form action="../function/join_user.php" method="post" class="join_form" enctype="multipart/form-data">
                    <label for="join_id" class="id_label">아이디
                        <input id="join_id" class="input_join" type="text" name="join_id" tabindex=3 autofocus>
                    </label>
                    <label class="comm_label">비밀번호
                        <input type="password" name="join_pw" class="input_join" tabindex=5>
                    </label>
                    <label class="comm_label">이름
                        <input type="text" name="join_name" class="input_join" tabindex=8>
                    </label>
                    <label class="comm_label">전화번호
                        <input type="text" name="join_telnum" class="input_join" tabindex=10>
                    </label>
                    <label class="comm_label gender_label">성별
                        <select name="join_gender" class="input_join gender_join" tabindex=13>
                            <option value="여자">여자</option>
                            <option value="남자">남자</option>
                        </select>
                    </label>
                    <label class="comm_label birth_label">생년월일
                        <input type="date" name="join_birth" class="input_join" tabindex=17>
                    </label>
                    <label class="comm_label">이메일
                        <input type="text" name="join_email" class="input_join" tabindex=20>
                    </label>
                    <label class="comm_label address_label">주소
                        <input type="text" name="join_address" class="input_join" tabindex=25>
                    </label>
                    <hr class="form_line">
                    <label class="joinmemo_label">메모
                        <input type="text" name="join_memo" class="input_join memo_join" tabindex=40>
                    </label >
                    <hr class="form_line">
                    <canvas id="random_num" class="random_num">&nbsp;</canvas>
                    <label for="join_randomnum">
                        <input type="number" name="join_randomnum" class="input_join join_randomnum" id="join_randomnum" placeholder="위의 숫자를 기입하시오." tabindex=35>
                    </label>
                    <div class="pic_right">
                        <span class="temp_pic">&nbsp;</span>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <label class="face_pic">
                            <input type="file" accept="image/*" name="join_file" class="file_join" tabindex=30>
                        </label>
                    </div>
                    <label for="join_submit">
                        <input type="submit" name="join_submit" class="submit_join" id="submit_join" value="등록" tabindex=50>
                    </label>
                </form>
            </div>
        </article>

<?php    
    #include "../php/detach/main_window.php";
    #nclude "../php/detach/insert_window.php";
    include "../php/detach/task_bar.php";
    include "../php/detach/scriptn_closetag.php";
?>