CREATE DATABASE parcel_tracking;
USE parcel_tracking;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE parcels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tracking_number VARCHAR(20) UNIQUE NOT NULL,
    sender_name VARCHAR(100) NOT NULL,
    sender_address TEXT NOT NULL,
    receiver_name VARCHAR(100) NOT NULL,
    receiver_address TEXT NOT NULL,
    status ENUM('จัดส่งแล้ว', 'กำลังดำเนินการ', 'ถึงปลายทาง') DEFAULT 'กำลังดำเนินการ',
    vehicle ENUM('รถยนต์', 'เครื่องบิน') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
