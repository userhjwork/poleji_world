<?php
include('./connect_db.php');

// 관리자 테이블 생성
$sql_admin = "CREATE TABLE IF NOT EXISTS ocr_project_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_admin) === TRUE) {
    echo "관리자 테이블 생성 성공<br>";
} else {
    echo "관리자 테이블 생성 실패: " . $conn->error . "<br>";
}

// 기본 관리자 계정 생성 (비밀번호: admin123)
$default_admin_password = password_hash('admin123', PASSWORD_DEFAULT);
$sql_insert_admin = "INSERT IGNORE INTO ocr_project_admin (username, password) 
                     VALUES ('admin', '$default_admin_password')";

if ($conn->query($sql_insert_admin) === TRUE) {
    echo "기본 관리자 계정 생성 성공<br>";
} else {
    echo "기본 관리자 계정 생성 실패: " . $conn->error . "<br>";
}

echo "테이블 생성 완료!";
?> 