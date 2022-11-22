<?php

session_start(); 
if (isset($_POST['login']) || $_POST['login'] == 'login') {
	//connection
	//รับค่า user & password
    if($_POST['i_student_id'] == '61000' && $_POST['password'] == '26122542'){
        $_SESSION['i_student_id'] = '61000';
        $_SESSION['i_level'] = 'ปริญญาตรี';
        $_SESSION['i_tel'] = '0888888888';
        $_SESSION['i_name'] = 'นางสาวxxx xxx';
        $_SESSION['i_group'] = 'วิทยาศาสตร์และเทคโนโลยี';
        $_SESSION['i_branch'] = 'วิทยาการคอมพิวเตอร์';
        header("Location:../index.php");
    }else{
        echo "<script>";
        echo "window.location.href = '../login.php?error=ไม่พบรหัสนักศึกษา กรุณาลองใหม่อีกครั้ง';";
        // echo "alert('ไม่พบรหัสนักศึกษา กรุณาลองใหม่อีกครั้ง');";
        echo "</script>";
    }
}else{
    Header("Location: ./login"); //user & password incorrect back to login again
}
mysqli_close($db);
?>