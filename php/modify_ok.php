<?
if(isset($_POST['insert_submit'])){
    if(!isset($_COOKIE['atti_id'])){
        echo "<script> alert('로그인해주세요(쿠키없음).'); location.replace('./first.php');</script>";
        }   
        
    include "../inc/info.inc";
    $atti_connect = mysqli_connect("localhost",$my_id,$my_pw,$my_db);
    $atti_id = $_COOKIE['atti_id'];
    $atti_pw = $_COOKIE['atti_pw'];

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
        $modify_atti = "update `atti_user_telbook` set 
                                                tb_name = '".$atti_name."',
                                                tb_telnum = '".$atti_telnum."',
                                                tb_photo = '".basename($attipic_tmpname).'.'.$attipic_filetype."',
                                                tb_photo_filename = '".$attipic_realname."',
                                                tb_sex = '".$atti_gender."',
                                                tb_birth = '".$atti_birth."',
                                                tb_email = '".$atti_email."',
                                                tb_address = '".$atti_address."',
                                                tb_etc = '".$atti_memo."'
                                                where tb_user_id = '".$atti_id."' AND 
                                                tb_telnum = '".$atti_telnum."'";
    
    $result_modify = mysqli_query($atti_connect,$modify_atti);
    
    if(!$result_modify){
        echo '<script>alert("자료수정실패"); </script>';
        echo mysqli_error($result_modify);

    }else{
        echo '<script>alert("성공적으로 수정 되었습니다."); location="./main.php";</script>';
    }

    @mysqli_free_result($result_modify);
	mysqli_close($atti_connect); #끝내고 돌려보내야 또 갱신이 되지 않는다.
}
?>
