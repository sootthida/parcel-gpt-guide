<?php
include '../config/db.php';

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
    <title>สถานะพัสดุ</title>
</head>
<body>
    <h1>📦 สถานะพัสดุ</h1>
    <?php if ($parcel): ?>
        <p>เลขพัสดุ: <?= $parcel['tracking_number'] ?></p>
        <p>สถานะ: <?= $parcel['status'] ?></p>
    <?php else: ?>
        <p>❌ ไม่พบพัสดุนี้</p>
    <?php endif; ?>
</body>
</html>
