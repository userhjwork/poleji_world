<?php
include('./connect_db.php');

$ctgry_1 = $_POST['ctgry_1'] ?? '';
$ctgry_2 = $_POST['ctgry_2'] ?? '';
$ctgry_3 = $_POST['ctgry_3'] ?? '';
$o_pay = $_POST['o_pay'] ?? null;
$o_reward = $_POST['o_reward'] ?? null;
$o_amount = $_POST['o_amount'] ?? null;
$o_description = $_POST['o_description'] ?? null;

// 입력 최소 검증
if (!$ctgry_1 || !$ctgry_2 || !$ctgry_3 || !$o_pay) {
    http_response_code(400);
    echo "필수값 누락";
    exit;
}

$sql = "INSERT INTO tbl_church_out 
(ctgry_1, ctgry_2, ctgry_3, o_pay, o_reward, o_amount, o_description)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $ctgry_1, $ctgry_2, $ctgry_3, $o_pay, $o_reward, $o_amount, $o_description);
$result = $stmt->execute();

if ($result) {
    echo "ok";
} else {
    http_response_code(500);
    echo "DB 오류";
}
?>
