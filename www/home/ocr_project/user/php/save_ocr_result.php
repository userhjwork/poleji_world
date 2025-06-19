<?php
session_start();
header('Content-Type: application/json');

// 로그인 확인
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    echo json_encode(['success' => false, 'message' => '로그인이 필요합니다.']);
    exit();
}

include('./connect_db.php');

// POST 데이터 받기
$input = json_decode(file_get_contents('php://input'), true);
$extracted_text = $input['extracted_text'] ?? '';
$processing_time = $input['processing_time'] ?? 0;
$confidence = $input['confidence'] ?? 0;
$user_id = $_SESSION['user_id'];

if (empty($extracted_text)) {
    echo json_encode(['success' => false, 'message' => '텍스트 데이터가 없습니다.']);
    exit();
}

// OCR 결과 저장
$stmt = $conn->prepare("INSERT INTO ocr_project_ocr_result (user_id, extracted_text, processing_time, confidence) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isdd", $user_id, $extracted_text, $processing_time, $confidence);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'OCR 결과가 저장되었습니다.']);
} else {
    echo json_encode(['success' => false, 'message' => 'OCR 결과 저장 중 오류가 발생했습니다.']);
}

$stmt->close();
$conn->close();
?> 