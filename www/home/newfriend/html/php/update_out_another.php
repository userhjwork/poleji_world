<?php
include('./connect_db.php');

$o_idx = $_POST['o_idx'];
$department = $_POST['department'];
$o_pay = $_POST['o_pay'];
$ctgry_1 = $_POST['ctgry_1'];
$ctgry_2 = $_POST['ctgry_2'];
$ctgry_3 = $_POST['ctgry_3'];
$o_reward = $_POST['o_reward'] ?: null;

$o_amount = $_POST['o_amount'] ?: null;
$o_amount = is_numeric($o_amount) ? floatval($o_amount) : null;

$o_description = $_POST['o_description'];

// 입력 최소 검증
if (!$department || !$ctgry_1 || !$ctgry_2 || !$ctgry_3 || !$o_pay || $o_amount === null) {
    http_response_code(400);
    echo "필수값 누락";
    exit;
}

$sql = "UPDATE tbl_church_out_multi 
        SET department=?, o_pay=?, ctgry_1=?, ctgry_2=?, ctgry_3=?, o_reward=?, o_amount=?, o_description=? 
        WHERE o_idx=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssdsi", 
    $department, $o_pay, $ctgry_1, $ctgry_2, $ctgry_3,
    $o_reward, $o_amount, $o_description,
    $o_idx
);
$result = $stmt->execute();

if ($result) {
    echo "ok";
} else {
    http_response_code(500);
    echo "DB 오류";
}
?> 