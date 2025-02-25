<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักผู้ดูแลระบบ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>🖥️ หน้าหลักผู้ดูแลระบบ</h1>
            <p>ยินดีต้อนรับ, <strong><?= $_SESSION['admin_username'] ?></strong>!</p>
        </div>
        
        <div class="admin-actions">
            <a href="add_parcel.php" class="action-btn">เพิ่มพัสดุ</a>
            <a href="manage_parcels.php" class="action-btn">จัดการพัสดุ (CRUD)</a>
            <a href="logout.php" class="logout-btn">ออกจากระบบ</a>
        </div>
    </div>
</body>
</html>
