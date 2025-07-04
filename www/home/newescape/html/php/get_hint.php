<?php
header('Content-Type: application/json; charset=utf-8');
include('./connect_db.php');

if (!isset($_GET['hint_number'])) {
    echo json_encode(['error' => '힌트 번호가 필요합니다.']);
    exit;
}

$hint_number = $_GET['hint_number'];

$sql = "SELECT hint_number, hint_text, hint_image, answer_text, answer_image FROM tbl_newescape_hints WHERE hint_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $hint_number);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $hint = $result->fetch_assoc();
    echo json_encode([
        'success' => true,
        'hint_number' => $hint['hint_number'],
        'hint_text' => $hint['hint_text'],
        'hint_image' => $hint['hint_image'],
        'answer_text' => $hint['answer_text'],
        'answer_image' => $hint['answer_image']
    ]);
} else {
    echo json_encode([
        'success' => false,
        'error' => '해당 번호의 힌트를 찾을 수 없습니다.'
    ]);
}

$stmt->close();
$conn->close();
?> 