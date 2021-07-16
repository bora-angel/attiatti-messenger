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
        let main_entry = () => {

            let window_flag = 1;
            let join_us = document.getElementById("join_us");
            let rancan_num = 0;
            let submit_join = document.getElementById("submit_join");
            const logout_btn = document.getElementById("logout_btn");
            const insert_btn = document.getElementById("insert_btn");
            const delete_btn = document.getElementById("delete_btn");
            /* 클래스 list_people을 누르면 그 자식인  */
            //$(".list_people").on("click",$(".in_list").toggle());
    
            //창을 내리고 닫을 수 있게 하는 이벤트
            this.addEventListener("click",(e)=>{
                let atti_window = document.getElementById("atti_window");
                let join_window = document.getElementById("join_window");
                let atti_bar = document.getElementById("atti_bar");
                let atti_none_bar = document.getElementById("atti_none_bar");
                    
                    switch(e.target.id){
    
                        case "attib_icon":
                        atti_window.style.display = "block";
                        join_window.style.display = "none";
                        atti_bar.style.visibility = "visible";
                        atti_bar.style.display = "inline-block";
                        atti_none_bar.style.display = "none"
                        return window_flag = 1;
                        break;          
    
                        case "x_btn":
                        atti_window.style.display = "none";
                        join_window.style.display = "none";
                        atti_bar.style.visibility = "hidden";
                        atti_none_bar.style.display = "none";
                        return window_flag = 1;
                        break;
                        
                        case "underbar_btn":
                        atti_window.style.display = "none";
                        join_window.style.display = "none";
                        atti_bar.style.display = "none";
                        atti_none_bar.style.display = "inline-block";
                        return window_flag = 1;
                        break;
    
                        case "atti_none_bar":
                        if( window_flag == 1){
                            atti_window.style.display = "block";
                            join_window.style.display = "none";
                            atti_bar.style.display = "inline-block";
                            atti_none_bar.style.display = "none";
                            return window_flag = 1;
                        }else{
                            atti_window.style.display = "none";
                            join_window.style.display = "block";
                            atti_bar.style.display = "inline-block";
                            atti_none_bar.style.display = "none";
                            return window_flag = 0;
                        }
                        break; 
    
                        case "atti_bar":
                        atti_window.style.display = "none";
                        join_window.style.display = "none";
                        atti_none_bar.style.display = "inline-block";
                        atti_bar.style.display = "none";
                        break; 
    
                        //신규가입 랜덤숫자 생성 이벤트
                        case "join_us":
                        atti_window.style.display = "none";
                        join_window.style.display = "block";
                        atti_bar.style.display = "inline-block";
                        atti_none_bar.style.display = "none";
                        let random_canvas = document.getElementById("random_num");
                        let rannum_2text = random_canvas.getContext("2d");
                        rancan_num = Math.floor(Math.random()*9000)+1000;
                        rannum_2text.clearRect(0,0,random_canvas.width, random_canvas.height);
                        rannum_2text.font="100px ChosunGu";
                        rannum_2text.fillText(rancan_num,57,113);
                        return window_flag = 0;
                        break;
    
                        case "join_unbar":
                        atti_window.style.display = "none";
                        join_window.style.display = "none";
                        atti_bar.style.display = "none";
                        atti_none_bar.style.display = "inline-block";
                        return window_flag = 0;
                        break;
    
                        case "join_x":
                        atti_window.style.display = "none";
                        join_window.style.display = "none";
                        atti_bar.style.visibility = "hidden";
                        atti_none_bar.style.display = "none";
                        return window_flag = 0;
                        break;
    
                        case "insert_btn":
                            alert("nya");
                        break;
    
                        case "delete_btn":
                            alert("nya");
                        break;
    
                        case "logout_btn":
                        location.replace("./logout.php");
                        break;
                    }
    
                });
                            //신규가입 정규식과 랜덤숫자 확인 이벤트
    /*        submit_join.addEventListener("click", function(){
				let join_randomnum = document.getElementById("join_randomnum").value;


                let re_flag = 1;
                switch(){
                    case :
                }
				if(!re_flag){
					alert("제대로 입력해주세요.");
                    event.preventDefault();
				}else if(rancan_num == join_randomnum){
					
				}else{
					alert("숫자가 틀려요.");
					location.reload();
				}
			});
    */        
        }
        onload = () => { main_entry();}