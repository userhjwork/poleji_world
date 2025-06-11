<?php
include('./connect_db.php');

$i_idx = $_POST['i_idx'];
$i_ctgry = $_POST['i_ctgry'];
$i_reward = $_POST['i_reward'] ?: null;

$i_amount = $_POST['rawAmount'] ?: null;
$i_amount = is_numeric($i_amount) ? floatval($i_amount) : null;

$i_description = $_POST['i_description'];

// 필수값 검사
if (!$i_idx || !$i_ctgry || !$i_reward || !$i_amount) {
    http_response_code(400);
    echo "필수값 누락";
    exit;
}

$sql = "UPDATE tbl_church_in 
        SET i_ctgry=?, i_reward=?, i_amount=?, i_description=? 
        WHERE i_idx=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdsi", 
    $i_ctgry,
    $i_reward, $i_amount, $i_description,
    $i_idx
);
$stmt->execute();

header("Location: ../index_history_all.php"); // 목록으로 이동
