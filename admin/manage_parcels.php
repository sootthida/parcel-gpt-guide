<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$sql = "SELECT * FROM parcels";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการพัสดุ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="manage-parcel">
    <div class="container-manage-parcel">
        <header class="manage-parcel">
            <!-- <div class="manage-parcel">
            </div> -->
                <h1>📦 จัดการพัสดุ</h1>
            <a href="add_parcel.php" class="add-btn-manage-parcel">เพิ่มข้อมูลพัสดุใหม่</a>
        </header>

        <table class="manage-parcel">
            <thead>
                <tr>
                    <th>เลขพัสดุ</th>
                    <th>ผู้ส่ง</th>
                    <th>ผู้รับ</th>
                    <th>สถานะ</th>
                    <th>การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($parcel = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $parcel['tracking_number'] ?></td>
                        <td><?= $parcel['sender_name'] ?></td>
                        <td><?= $parcel['receiver_name'] ?></td>
                        <td><?= $parcel['status'] ?></td>
                        <td>
                            <a href="edit_parcel.php?id=<?= $parcel['id'] ?>" class="edit-btn-manage-parcel">✒️</a> |
                            <a href="delete_parcel.php?id=<?= $parcel['id'] ?>" class="delete-btn-manage-parcel" onclick="return confirm('คุณต้องการลบพัสดุนี้ใช่หรือไม่?')">ลบ</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <!-- ปุ่มย้อนกลับไปยังหน้าแสดงรายการพัสดุ -->
        <a href="admin.php" class="back-to-home">ย้อนกลับไปยังหน้าหลัก</a>
    </div>
</body>
</html>
