<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบติดตามพัสดุ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>🔍 ค้นหาพัสดุ</h1>
        </header>

        <main>
            <!-- Form for tracking -->
            <div class="form-container">
                <form action="track.php" method="GET">
                    <input type="text" name="tracking_number" placeholder="กรอกเลขพัสดุ" required>
                    <button type="submit" class="search-btn">ค้นหา</button>
                </form>
            </div>

            <!-- Button to go to Admin Login -->
            <div class="admin-login-container">
                <a href="../admin/login.php" class="admin-login-btn">เข้าสู่ระบบผู้ดูแลระบบ</a>
            </div>
        </main>
        
        <footer>
            <p>&copy; 2025 ระบบติดตามพัสดุ | ทุกสิทธิ์สงวนไว้</p>
        </footer>
    </div>
</body>
</html>
