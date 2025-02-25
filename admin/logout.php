<?php
session_start();
session_unset();  // ล้างข้อมูล session ทั้งหมด
session_destroy(); // ทำลาย session
header("Location: login.php"); // เปลี่ยนหน้าไปที่หน้าล็อกอิน
exit();
?>
