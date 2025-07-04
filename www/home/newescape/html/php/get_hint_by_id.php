<?php
header('Content-Type: application/json; charset=utf-8');
include('./connect_db.php');

if (!isset($_GET['id'])) {
    echo json_encode(['success' => false, 'error' => 'ID가 필요합니다.']);
    exit;
}

$id = $_GET['id'];

$sql = "SELECT id, hint_number, hint_text, hint_image, answer_text, answer_image FROM tbl_newescape_hints WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $hint = $result->fetch_assoc();
    echo json_encode(['success' => true, 'hint' => $hint]);
} else {
    echo json_encode(['success' => false, 'error' => '해당 ID의 힌트를 찾을 수 없습니다.']);
}

$stmt->close();
$conn->close();
?> 