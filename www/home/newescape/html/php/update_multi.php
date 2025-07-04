<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('./connect_db.php');

// === 입력값 검증 ===
$id = $_POST['id'] ?? null;
$department = $_POST['department'] ?? '';
$ctgry_1 = $_POST['ctgry_1'] ?? '';
$ctgry_2 = $_POST['ctgry_2'] ?? '';
$ctgry_3 = $_POST['ctgry_3'] ?? '';
$o_pay = $_POST['o_pay'] ?? '';
$o_reward = $_POST['o_reward'] ?? '';
$o_amount = $_POST['rawAmount'] ?? '';
$o_description = $_POST['o_description'] ?? '';

if (!$id || !$department || !$ctgry_1 || !$ctgry_2 || !$ctgry_3 || !$o_pay) {
    http_response_code(400);
    echo "필수 입력값이 누락되었습니다.";
    exit;
}

// === 데이터 업데이트 ===
$updateSQL = "
UPDATE tbl_church_out_multi 
SET 
    department = :department,
    ctgry_1 = :ctgry_1,
    ctgry_2 = :ctgry_2,
    ctgry_3 = :ctgry_3,
    o_pay = :o_pay,
    o_reward = :o_reward,
    o_amount = :o_amount,
    o_description = :o_description
WHERE id = :id
";

try {
    $stmt = $pdo->prepare($updateSQL);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':ctgry_1', $ctgry_1);
    $stmt->bindParam(':ctgry_2', $ctgry_2);
    $stmt->bindParam(':ctgry_3', $ctgry_3);
    $stmt->bindParam(':o_pay', $o_pay);
    $stmt->bindParam(':o_reward', $o_reward ?: null);
    $stmt->bindParam(':o_amount', $o_amount ?: null);
    $stmt->bindParam(':o_description', $o_description ?: null);
    
    $stmt->execute();
    
    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo "해당 ID의 레코드를 찾을 수 없습니다.";
        exit;
    }
    
    echo "success";
} catch (PDOException $e) {
    http_response_code(500);
    echo "수정 실패: " . $e->getMessage();
}
?> 