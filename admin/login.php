<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ดึงข้อมูลผู้ใช้ที่ตรงกับ username
        $admin = $result->fetch_assoc();
        
        // เปรียบเทียบรหัสผ่านโดยตรง
        if ($admin['password'] === $password) {
            // ถ้ารหัสผ่านตรงกัน
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: admin.php");
            exit();
        } else {
            // ถ้ารหัสผ่านไม่ตรงกัน
            $error = "❌ ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error = "❌ ชื่อผู้ใช้ไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบผู้ดูแลระบบ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>เข้าสู่ระบบผู้ดูแลระบบ</h1>

        <form method="POST" class="login-form">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">รหัสผ่าน:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-btn">เข้าสู่ระบบ</button>

            <?php if (isset($error)): ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
