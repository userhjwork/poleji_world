<?php
header('Content-Type: application/json; charset=utf-8');
include('./connect_db.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'POST 요청만 허용됩니다.']);
    exit;
}

$id = $_POST['id'] ?? '';
$hint_number = $_POST['hint_number'] ?? '';
$hint_text = $_POST['hint_text'] ?? '';
$hint_image = $_POST['hint_image'] ?? '';
$answer_text = $_POST['answer_text'] ?? '';
$answer_image = $_POST['answer_image'] ?? '';

// 유효성 검사
if (empty($id) || empty($hint_number) || empty($hint_text) || empty($answer_text)) {
    echo json_encode(['success' => false, 'error' => '필수 필드가 누락되었습니다.']);
    exit;
}

// 힌트 번호 중복 확인 (자신 제외)
$check_sql = "SELECT id FROM tbl_newescape_hints WHERE hint_number = ? AND id != ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("si", $hint_number, $id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    echo json_encode(['success' => false, 'error' => '이미 존재하는 힌트 번호입니다.']);
    $check_stmt->close();
    exit;
}
$check_stmt->close();

// 힌트 수정
$sql = "UPDATE tbl_newescape_hints SET hint_number = ?, hint_text = ?, hint_image = ?, answer_text = ?, answer_image = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $hint_number, $hint_text, $hint_image, $answer_text, $answer_image, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => '힌트가 성공적으로 수정되었습니다.']);
} else {
    echo json_encode(['success' => false, 'error' => '수정 중 오류가 발생했습니다: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?> 