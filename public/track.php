<?php
include '../config/db.php';

$parcel = null;
if (isset($_GET['tracking_number'])) {
    $tracking_number = $_GET['tracking_number'];
    $stmt = $conn->prepare("SELECT * FROM parcels WHERE tracking_number = ?");
    $stmt->bind_param("s", $tracking_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $parcel = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานะพัสดุ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <!-- ปุ่มย้อนกลับ -->
        <a href="index.php" class="back-btn-track-user">⬅ กลับไปหน้าค้นหา</a>

        <div class="status-table-container">
            <h1>📦 สถานะพัสดุ</h1>
            <?php if ($parcel): ?>
                <table class="status-table">
                    <tr>
                        <th>เลขพัสดุ</th>
                        <td><?= $parcel['tracking_number'] ?></td>
                    </tr>
                    <tr>
                        <th>ชื่อผู้ส่ง</th>
                        <td><?= $parcel['sender_name'] ?></td>
                    </tr>
                    <tr>
                        <th>ที่อยู่ผู้ส่ง</th>
                        <td><?= $parcel['sender_address'] ?></td>
                    </tr>
                    <tr>
                        <th>ชื่อผู้รับ</th>
                        <td><?= $parcel['receiver_name'] ?></td>
                    </tr>
                    <tr>
                        <th>ที่อยู่ผู้รับ</th>
                        <td><?= $parcel['receiver_address'] ?></td>
                    </tr>
                    <tr>
                        <th>สถานะ</th>
                        <td><span class="status-label"><?= $parcel['status'] ?></span></td>
                    </tr>
                </table>
            <?php else: ?>
                <p class="error-message">❌ ไม่พบพัสดุนี้</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>