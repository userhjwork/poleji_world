<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('./connect_db.php');

// === 입력값 검증 ===
$department = $_POST['department'] ?? '';
$ctgry_1 = $_POST['ctgry_1'] ?? '';
$ctgry_2 = $_POST['ctgry_2'] ?? '';
$ctgry_3 = $_POST['ctgry_3'] ?? '';
$o_pay = $_POST['o_pay'] ?? '';
$o_reward = $_POST['o_reward'] ?? '';
$o_amount = $_POST['rawAmount'] ?? '';
$o_description = $_POST['o_description'] ?? '';

if (!$department || !$ctgry_1 || !$ctgry_2 || !$ctgry_3 || !$o_pay) {
    http_response_code(400);
    echo "필수 입력값이 누락되었습니다.";
    exit;
}

// === 테이블 생성 (없는 경우) ===
$createTableSQL = "
CREATE TABLE IF NOT EXISTS tbl_church_out_multi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department VARCHAR(50) NOT NULL,
    ctgry_1 VARCHAR(50) NOT NULL,
    ctgry_2 VARCHAR(50) NOT NULL,
    ctgry_3 VARCHAR(50) NOT NULL,
    o_pay DATE NOT NULL,
    o_reward DATE NULL,
    o_amount DECIMAL(10,2) NULL,
    o_description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
";

try {
    $pdo->exec($createTableSQL);
} catch (PDOException $e) {
    http_response_code(500);
    echo "테이블 생성 실패: " . $e->getMessage();
    exit;
}

// === 데이터 삽입 ===
$insertSQL = "
INSERT INTO tbl_church_out_multi (
    department, ctgry_1, ctgry_2, ctgry_3,
    o_pay, o_reward, o_amount, o_description
) VALUES (
    :department, :ctgry_1, :ctgry_2, :ctgry_3,
    :o_pay, :o_reward, :o_amount, :o_description
)";

try {
    $stmt = $pdo->prepare($insertSQL);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':ctgry_1', $ctgry_1);
    $stmt->bindParam(':ctgry_2', $ctgry_2);
    $stmt->bindParam(':ctgry_3', $ctgry_3);
    $stmt->bindParam(':o_pay', $o_pay);
    $stmt->bindParam(':o_reward', $o_reward ?: null);
    $stmt->bindParam(':o_amount', $o_amount ?: null);
    $stmt->bindParam(':o_description', $o_description ?: null);
    
    $stmt->execute();
    echo "success";
} catch (PDOException $e) {
    http_response_code(500);
    echo "저장 실패: " . $e->getMessage();
}
?> 