<?
if(isset($_POST['insert_submit'])){
    if(!isset($_COOKIE['atti_id'])){
        echo "<script> alert('로그인해주세요(쿠키없음).'); location.replace('./first.php');</script>";
        }   
        
    include "../inc/info.inc";
    $atti_connect = mysqli_connect("localhost",$my_id,$my_pw,$my_db);
    
    $modi_num = $_POST['modify_telnum'];
    $modi_name = $_POST['modify_name'];
    $modi_id = $_POST['modify_id'];
    $modi_flag = $_POST['modify_flag'];

    $atti_name = $_POST['join_name'];
    $atti_telnum = $_POST['join_telnum'];
    $atti_gender = $_POST['join_gender'];
    $atti_birth = $_POST['join_birth'];
    $atti_email = $_POST['join_email'];
    $atti_address = $_POST['join_address'];
    $atti_memo = $_POST['join_memo'];
    $atti_pic =$_FILES['join_file'];


    $attipic_realname = basename($_FILES['join_file']['name']);
        if($_FILES['join_file']['error'] == UPLOAD_ERR_OK){
            $attipic_tmpname = $_FILES['join_file']['tmp_name'];
            $attipic_dir = "/home/c11st25/public_html/portfolio/messenger/img/temp/tmp";
            $tmp_file = $attipic_dir.basename($attipic_tmpname) ;
            $attipic_filetype = pathinfo($_FILES['join_file']['name'],PATHINFO_EXTENSION);
            move_uploaded_file($attipic_tmpname, $tmp_file.'.'.$attipic_filetype);
        }else{
            echo '<script>alert("사진추가실패");</script>';

        }

        if(!$atti_connect){
            echo "db connect error: ".mysqli_error($atti_connect);
            exit;
        }
        if(!mysqli_select_db($atti_connect, "c11st25")){
            echo "db select error";
            exit;
        }
        
        $modify_user = "update `user_telbook` set 
                                                user_name = '".$atti_name."',
                                                user_telnum = '".$atti_telnum."',
                                                user_photo = '".basename($attipic_tmpname).'.'.$attipic_filetype."',
                                                user_photo_filename = '".$attipic_realname."',
                                                user_gender = '".$atti_gender."',
                                                user_birth = '".$atti_birth."',
                                                user_email = '".$atti_email."',
                                                user_address = '".$atti_address."',
                                                user_etc = '".$atti_memo."'
                                                where user_id = '".$modi_id."' AND 
                                                user_telnum = '".$modi_num."'";


        $modify_tb = "update `atti_user_telbook` set 
                                                tb_name = '".$atti_name."',
                                                tb_telnum = '".$atti_telnum."',
                                                tb_photo = '".basename($attipic_tmpname).'.'.$attipic_filetype."',
                                                tb_photo_filename = '".$attipic_realname."',
                                                tb_sex = '".$atti_gender."',
                                                tb_birth = '".$atti_birth."',
                                                tb_email = '".$atti_email."',
                                                tb_address = '".$atti_address."',
                                                tb_etc = '".$atti_memo."'
                                                where tb_user_id = '".$modi_id."' AND 
                                                tb_telnum = '".$modi_num."'";
    
    $user_modify = mysqli_query($atti_connect,$modify_user);
    $tb_modify = mysqli_query($atti_connect,$modify_tb);

    if($modi_flag =="user"){
        mysqli_query($atti_connect,$modify_user);
        echo '<script>alert("성공적으로 수정 되었습니다."); location="./admin_main.php";</script>';
    }else{
        mysqli_query($atti_connect,$modify_tb);
        echo '<script>alert("성공적으로 수정 되었습니다."); location="./admin_main.php";</script>';
    }

    @mysqli_free_result($user_modify);
    @mysqli_free_result($tb_modify);
	mysqli_close($atti_connect); #끝내고 돌려보내야 또 갱신이 되지 않는다.
}
?>
