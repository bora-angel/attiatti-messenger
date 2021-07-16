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
        //임시파일이 들어가는 폴더도 퍼미션  허가

        if(!$atti_connect){
            echo "db connect error: ".mysqli_error($atti_connect);
            exit;
        }
        if(!mysqli_select_db($atti_connect, "c11st25")){
            echo "db select error";
            exit;
        }
        
        $join_atti = "insert into `atti_user_telbook` values('','".$atti_id."',
                                                PASSWORD('".$atti_pw."'),
                                                '".$atti_name."',
                                                '".$atti_telnum."',
                                                '".basename($attipic_tmpname).'.'.$attipic_filetype."',
                                                '".$attipic_realname."',
                                                '".$atti_gender."',
                                                '".$atti_birth."',
                                                '".$atti_email."',
                                                '".$atti_address."',
                                                '".$atti_memo."')";
    
    $result_join = mysqli_query($atti_connect,$join_atti);
    
    if(!$result_join){
        echo '<script>alert("자료추가실패"); location="./main.php"; </script>';
        echo mysqli_error($result_join);

    }else{
        echo '<script>alert("성공적으로 추가 되었습니다."); location="./main.php";</script>';
    }

    @mysqli_free_result($result_join);
	mysqli_close($atti_connect); #끝내고 돌려보내야 또 갱신이 되지 않는다.
}
?>
