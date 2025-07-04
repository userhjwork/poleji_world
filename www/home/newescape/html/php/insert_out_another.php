<?php
include('./connect_db.php');

$department = $_POST['department'] ?? '';
$ctgry_1 = $_POST['ctgry_1'] ?? '';
$ctgry_2 = $_POST['ctgry_2'] ?? '';
$ctgry_3 = $_POST['ctgry_3'] ?? '';
$o_pay = $_POST['o_pay'] ?? null;
$o_reward = $_POST['o_reward'] ?? null;

$o_amount = $_POST['rawAmount'] ?? null;
$o_amount = is_numeric($o_amount) ? floatval($o_amount) : null;

$o_description = $_POST['o_description'] ?? null;

// 입력 최소 검증
if (!$department || !$ctgry_1 || !$ctgry_2 || !$ctgry_3 || !$o_pay || $o_amount === null) {
    http_response_code(400);
    echo "필수값 누락";
    exit;
}

// 새로운 테이블 생성 (이미 존재하면 무시됨)
$createTableSql = "CREATE TABLE IF NOT EXISTS tbl_church_out_multi (
    o_idx INT AUTO_INCREMENT PRIMARY KEY,
    department VARCHAR(50) NOT NULL,
    ctgry_1 VARCHAR(100) NOT NULL,
    ctgry_2 VARCHAR(100) NOT NULL,
    ctgry_3 VARCHAR(100) NOT NULL,
    o_pay DATE NOT NULL,
    o_reward DATE NULL,
    o_amount DECIMAL(10,2) NOT NULL,
    o_description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($createTableSql);

$sql = "INSERT INTO tbl_church_out_multi 
(department, ctgry_1, ctgry_2, ctgry_3, o_pay, o_reward, o_amount, o_description)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssds", $department, $ctgry_1, $ctgry_2, $ctgry_3, $o_pay, $o_reward, $o_amount, $o_description);
$result = $stmt->execute();

if ($result) {
    echo "ok";
} else {
    http_response_code(500);
    echo "DB 오류";
}
?> 