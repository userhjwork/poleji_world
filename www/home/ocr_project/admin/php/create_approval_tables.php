<?php
include('./connect_db.php');

// OCR 승인 대기 테이블 생성
$sql_pending = "CREATE TABLE IF NOT EXISTS ocr_project_pending_approval (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    user_username VARCHAR(50),
    card_type VARCHAR(50) DEFAULT 'unknown',
    card_number VARCHAR(100),
    name VARCHAR(100),
    recognized_text TEXT,
    confidence FLOAT,
    processing_time FLOAT,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    admin_comment TEXT,
    processed_by INT,
    processed_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES ocr_project_user(id) ON DELETE CASCADE,
    FOREIGN KEY (processed_by) REFERENCES ocr_project_admin(id) ON DELETE SET NULL
)";

if ($conn->query($sql_pending) === TRUE) {
    echo "OCR 승인 대기 테이블 생성 성공<br>";
} else {
    echo "OCR 승인 대기 테이블 생성 실패: " . $conn->error . "<br>";
}

// OCR 승인 처리 로그 테이블 생성
$sql_log = "CREATE TABLE IF NOT EXISTS ocr_project_approval_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pending_id INT,
    user_id INT,
    user_username VARCHAR(50),
    card_type VARCHAR(50),
    card_number VARCHAR(100),
    name VARCHAR(100),
    action ENUM('approved', 'rejected') NOT NULL,
    admin_comment TEXT,
    processed_by INT,
    processed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (processed_by) REFERENCES ocr_project_admin(id) ON DELETE SET NULL
)";

if ($conn->query($sql_log) === TRUE) {
    echo "OCR 승인 로그 테이블 생성 성공<br>";
} else {
    echo "OCR 승인 로그 테이블 생성 실패: " . $conn->error . "<br>";
}

echo "OCR 승인 시스템 테이블 생성 완료!";
?> 