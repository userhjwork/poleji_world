<?php
include('./connect_db.php');

$i_ctgry = $_POST['i_ctgry'] ?? '';
$i_reward = $_POST['i_reward'] ?? null;

$i_amount = $_POST['rawAmount'] ?? null;
$i_amount = is_numeric($i_amount) ? floatval($i_amount) : null;

$i_description = $_POST['i_description'] ?? null;

// 입력 최소 검증
if (!$i_ctgry || !$i_reward || !$i_amount) {
    http_response_code(400);
    echo "필수값 누락";
    exit;
}

$sql = "INSERT INTO tbl_church_in 
(i_ctgry, i_reward, i_amount, i_description)
VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssds", $i_ctgry, $i_reward, $i_amount, $i_description);
$result = $stmt->execute();

if ($result) {
    echo "ok";
} else {
    http_response_code(500);
    echo "DB 오류";
}
?>
