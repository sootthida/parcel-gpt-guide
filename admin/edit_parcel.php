<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM parcels WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $parcel = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE parcels SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();

    echo "✅ อัปเดตสถานะพัสดุสำเร็จ!";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสถานะพัสดุ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="edit-parcel">
    <div class="container-edit-parcel">
        <header class="edit-parcel">
            <h1>🛠️ แก้ไขสถานะพัสดุ</h1>
        </header>

        <form method="POST" class="parcel-form">
            <div class="form-group-edit-parcel">
                <label for="tracking_number">เลขพัสดุ:</label>
                <input type="text" id="tracking_number" name="tracking_number" value="<?= $parcel['tracking_number'] ?>" disabled>
            </div>

            <div class="form-group-edit-parcel">
                <label for="status">สถานะ:</label>
                <select name="status" id="status">
                    <option value="กำลังดำเนินการ" <?= $parcel['status'] == 'กำลังดำเนินการ' ? 'selected' : '' ?>>กำลังดำเนินการ</option>
                    <option value="จัดส่งแล้ว" <?= $parcel['status'] == 'จัดส่งแล้ว' ? 'selected' : '' ?>>จัดส่งแล้ว</option>
                    <option value="ถึงปลายทาง" <?= $parcel['status'] == 'ถึงปลายทาง' ? 'selected' : '' ?>>ถึงปลายทาง</option>
                </select>
            </div>

            <button type="submit" class="submit-btn-edit-parcel">อัปเดตสถานะ</button>
        </form>

        <div class="back-btn-edit-parcel">
            <a href="manage_parcels.php" class="back-link-edit-parcel">ย้อนกลับไปหน้าจัดการพัสดุ</a>
        </div>
    </div>
</body>
</html>
