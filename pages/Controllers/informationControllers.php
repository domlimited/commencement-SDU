<?php
session_start(); 
include("../../conn.php");
if (isset($_POST['insert_i']) || $_POST['insert_i'] == 'insert_i') {
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $SQL_INSERT_information = "INSERT INTO `information`
    ( `i_student_id`, `i_level`, `i_tel`, `i_img`,
     `i_radio`, `i_name`, `i_group`, `i_branch`,
      `i_created_at`) 
    VALUES ('".$_POST['i_student_id']."','".$_POST['i_level']."','".$_POST['i_tel']."','".$_FILES["i_img"]["name"]."',
    '".$_POST['i_radio']."','".$_POST['i_name']."','".$_POST['i_group']."','".$_POST['i_branch']."',
    '".date("Y-m-d H:i:s")."')";
    $RESULT_INSERT_information = mysqli_query($db, $SQL_INSERT_information);
    if($RESULT_INSERT_information){
        $i_img = $_FILES['i_img']['tmp_name'];
        $file = '../images/'.$_FILES["i_img"]["name"];
        $success = move_uploaded_file($i_img, $file);
        if($success){
            echo "<script>";
            echo "window.location.href = '../report.php?msg=บันทึกข้อมูลคุณเรียบร้อย';";
            echo "</script>";
        }else{
            echo "<script>";
            echo "window.location.href = '../index.php?error=พบปัญหาการอัพโหลดรูป';";
            echo "</script>";
        }
    }else{
        echo "<script>";
        echo "window.location.href = '../index.php?error=พบปัญหาการบันทึกข้อมูล';";
        echo "</script>";
    }
}else if(isset($_POST['edit_tel']) || $_POST['edit_tel'] == 'edit_tel'){
    $SQL_EDIT_information = "UPDATE `information` SET `i_tel`='".$_POST['i_tel']."' WHERE `i_id` = '".$_POST['i_id']."'";
    $RESULT_EDIT_information = mysqli_query($db, $SQL_EDIT_information);
    if($RESULT_EDIT_information){
        echo "<script>";
        echo "window.location.href = '../report.php?msg=แก้ไขเบอร์โทรศัพท์คุณเรียบร้อย';";
        echo "</script>";
    }else{
        echo "<script>";
        echo "window.location.href = '../index.php?error=พบปัญหาการแก้ไขข้อมูล';";
        echo "</script>";
    }
}else{
    Header("Location: ../index.php"); 
}
mysqli_close($db);
?>