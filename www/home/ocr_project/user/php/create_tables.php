<?php
include('./connect_db.php');

// 사용자 테이블 생성
$sql_user = "CREATE TABLE IF NOT EXISTS ocr_project_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_user) === TRUE) {
    echo "사용자 테이블 생성 성공<br>";
} else {
    echo "사용자 테이블 생성 실패: " . $conn->error . "<br>";
}

// OCR 결과 저장 테이블 생성
$sql_ocr_result = "CREATE TABLE IF NOT EXISTS ocr_project_ocr_result (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    original_image VARCHAR(255),
    extracted_text TEXT,
    confidence FLOAT,
    processing_time FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES ocr_project_user(id) ON DELETE CASCADE
)";

if ($conn->query($sql_ocr_result) === TRUE) {
    echo "OCR 결과 테이블 생성 성공<br>";
} else {
    echo "OCR 결과 테이블 생성 실패: " . $conn->error . "<br>";
}

echo "테이블 생성 완료!";
?> 