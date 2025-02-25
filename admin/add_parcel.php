<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tracking_number = $_POST['tracking_number'];
    $sender_name = $_POST['sender_name'];
    $sender_address = $_POST['sender_address'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_address = $_POST['receiver_address'];
    $vehicle = $_POST['vehicle'];

    $stmt = $conn->prepare("INSERT INTO parcels (tracking_number, sender_name, sender_address, receiver_name, receiver_address, vehicle) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $tracking_number, $sender_name, $sender_address, $receiver_name, $receiver_address, $vehicle);
    $stmt->execute();

    echo "<div class='success-message'>✅ บันทึกข้อมูลพัสดุสำเร็จ!</div>";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลพัสดุ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="form-container-add-parcel">
        <div class="add-parcel">
            <h1>📦 เพิ่มข้อมูลพัสดุ</h1>
        </div>
        <form method="POST">
            <div class="form-group-add-parcel">
                <label-add-parcel for="tracking_number">เลขพัสดุ:</label-add-parcel>
                <input type="text" id="tracking_number" name="tracking_number" placeholder="กรอกเลขพัสดุ" required>
            </div>

            <div class="form-group-add-parcel">
                <label-add-parcel for="sender_name">ชื่อผู้ส่ง:</label-add-parcel>
                
                <input type="text" id="sender_name" name="sender_name" placeholder="กรอกชื่อผู้ส่ง" required>
            </div>

            <div class="form-group-add-parcel">
                <label-add-parcel for="sender_address">ที่อยู่ผู้ส่ง:</label-add-parcel>
                <textarea id="sender_address" name="sender_address" placeholder="กรอกที่อยู่ผู้ส่ง" required></textarea>
            </div>

            <div class="form-group-add-parcel">
                <label-add-parcel for="receiver_name">ชื่อผู้รับ:</label-add-parcel>
                <input type="text" id="receiver_name" name="receiver_name" placeholder="กรอกชื่อผู้รับ" required>
            </div>

            <div class="form-group-add-parcel">
                <label-add-parcel for="receiver_address">ที่อยู่ผู้รับ:</label-add-parcel>
                <textarea id="receiver_address" name="receiver_address" placeholder="กรอกที่อยู่ผู้รับ" required></textarea>
            </div>

            <div class="form-group-add-parcel">
                <label-add-parcel for="vehicle">ประเภทการขนส่ง:</label-add-parcel>
                <select id="vehicle" name="vehicle">
                    <option value="รถยนต์">รถยนต์</option>
                    <option value="เครื่องบิน">เครื่องบิน</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">บันทึกข้อมูล</button>
            <!-- ปุ่มย้อนกลับไปยังหน้าแสดงรายการพัสดุ -->
            <a href="manage_parcels.php" class="back-btn">ย้อนกลับไปยังหน้ารายการพัสดุ</a>
        </form>
    </div>
</body>
</html>