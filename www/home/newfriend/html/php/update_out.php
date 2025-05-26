<?php
include('./connect_db.php');

$o_idx = $_POST['o_idx'];
$o_pay = $_POST['o_pay'];
$ctgry_1 = $_POST['ctgry_1'];
$ctgry_2 = $_POST['ctgry_2'];
$ctgry_3 = $_POST['ctgry_3'];
$o_reward = $_POST['o_reward'] ?: null;
$o_amount = $_POST['o_amount'] ?: null;
$o_description = $_POST['o_description'];

// 유효성 검사 생략 시 생략 가능

$sql = "UPDATE tbl_church_out 
        SET o_pay=?, ctgry_1=?, ctgry_2=?, ctgry_3=?, o_reward=?, o_amount=?, o_description=? 
        WHERE o_idx=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", 
    $o_pay, $ctgry_1, $ctgry_2, $ctgry_3,
    $o_reward, $o_amount, $o_description,
    $o_idx
);
$stmt->execute();

header("Location: ../index_history.php"); // 목록으로 이동
