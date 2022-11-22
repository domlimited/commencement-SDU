<?php 
session_start(); 
session_destroy();
echo "<script>";
echo "window.location.href = '../login.php?error=ออกจากระบบเรียบร้อย';";
echo "</script>";
?>