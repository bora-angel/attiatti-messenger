<?php
    setcookie("atti_login",'',time()-3600,'/');
    unset($_COOKIE['atti_login']);
?>

<meta http-equiv='refresh' content='0; url=./first.php'>